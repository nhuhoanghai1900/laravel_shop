<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
class OrderController extends Controller
{
    public function order(Request $request)
    {
        try {
            $cart = session('cart', []);
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
                'email' => ['required', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
                'address' => ['required', 'string', 'max:255'],
                'note' => ['nullable', 'string', 'max:1000'],
                'delivery_to_home' => ['sometimes', 'accepted'],
                'payment_cod' => ['sometimes', 'accepted'],
            ]);

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
                $productId = collect($cart)->pluck('product_id')->toArray(); // get list product_id từ $cart và chuyển thành mảng.
                $products = Product::whereIn('id', $productId)->get()->keyBy('id'); // Truy vấn product theo list 'productId' và trả về collection với key là id sản phẩm.
                foreach ($cart as $item) {
                    $product = $products[$item['product_id']] ?? null;
                    if (!$product || $product->price != $item['price']) {
                        return response()->json(['success' => false, 'message' => 'Giỏ hàng có sản phẩm không hợp lệ. Vui lòng tải lại trang'], 400);
                    }
                }
                DB::transaction(function () use ($validated, $request, $cart, $currentHash, &$order) {
                    $order = Order::create([
                        'name' => $validated['name'],
                        'phone' => $validated['phone'],
                        'email' => $validated['email'],
                        'address' => $validated['address'],
                        'note' => $validated['note'] ?? null,
                        'delivery_to_home' => $request->boolean('delivery_to_home'),
                        'payment_cod' => $request->boolean('payment_cod'),
                    ]);

                    foreach ($cart as $cartItem) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $cartItem['product_id'],
                            'quantity' => $cartItem['quantity'],
                            'price_each' => $cartItem['price'],
                            'total_price' => $cartItem['price'] * $cartItem['quantity'],
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
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng thanh toán thất bại, vui lòng thử lại!'], 500);
        }
    }
}
