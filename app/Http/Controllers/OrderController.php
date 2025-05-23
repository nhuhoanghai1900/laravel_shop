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
        $user = Auth()->user();
        $cart = session('cart', []);
        $validated = $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
            'address' => ['required', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:300'],
            'delivery_to_home' => ['sometimes', 'accepted'],
            'payment_cod' => ['sometimes', 'accepted'],
        ]);

        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Bạn không có sản phẩm nào trong giỏ hàng!'], 400);
        }

        try {
            DB::transaction(function () use ($validated, $request, $cart, $user) {
                $validated['user_id'] = $user->id;
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
                session()->forget('cart');
                session()->save();
            });
            return response()->json(['success' => true, 'message' => 'Đơn hàng đã được gửi thành công!', 'cart' => []]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
