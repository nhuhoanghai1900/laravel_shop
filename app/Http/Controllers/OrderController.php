<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
class OrderController extends Controller
{
    public function order(Request $request)
    {
        $cart = session('cart', []);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
            'email' => ['required', 'email:rfc,dns'],
            'address' => ['required', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:300'],
            'delivery_to_home' => ['sometimes', 'accepted'],
            'payment_cod' => ['sometimes', 'accepted'],
        ]);
        try {
            //check spam
            $currentHash = md5(json_encode(
                collect($cart)->map(fn($i) => Arr::only($i, ['product_id', 'color', 'size']))
                    ->sortBy('prroduct_id')
                    ->values()
            ));
            $lastHash = session('last_order_hash');
            $lastTime = session('last_order_time');
            if ($lastHash === $currentHash && $lastTime && now()->diffInSeconds($lastTime) < 120) {
                return response()->json(['success' => false, 'message' => 'Bạn vừa gửi đơn hàng này rồi, vui lòng chờ trong giây lát trước khi gửi lại.'], 429);
            }

            if (!empty($cart)) {
                // Giai đoạn 5: Kiểm tra sản phẩm trong giỏ hàng
                $productId = collect($cart)->pluck('product_id')->toArray();
                $products = Product::whereIn('id', $productId)->get()->keyBy('id');
                foreach ($cart as $item) {
                    $product = $products[$item['product_id']] ?? null;
                    if (!$product || $product->price != $item['price']) {
                        return response()->json(['success' => false, 'message' => 'Giỏ hàng có sản phẩm không hợp lệ. Vui lòng tải lại trang'], 400);
                    }
                }

                DB::transaction(function () use ($validated, $request, $cart, $currentHash, &$order) {
                    $validated['name'] = strtolower($validated['name']);
                    $validated['email'] = strtolower($validated['email']);
                    $validated['delivery_to_home'] = $request->boolean('delivery_to_home');
                    $validated['payment_cod'] = $request->boolean('payment_cod');
                    $order = Order::create($validated);

                    foreach ($cart as $item) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price_each' => $item['price'],
                            'total_price' => $item['price'] * $item['quantity'],
                        ]);
                    }
                    session([
                        'last_order_hash' => $currentHash,
                        'last_order_time' => now(),
                    ]);
                    session()->forget('cart');
                    session()->save();
                });
                return response()->json(['success' => true, 'message' => 'Đơn hàng đã được gửi thành công!', 'cart' => []]);
            } else {
                return response()->json(['success' => false, 'message' => 'Bạn không có sản phẩm nào trong giỏ hàng!'], 400);
            }

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đơn hàng thanh toán tất bại',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
