<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Order;
class OrderController extends Controller
{
    public function order(Request $request)
    {
        try {
            $cart = session('cart', []);

            //validate data người dùng
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
                'email' => ['required', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
                'address' => ['required', 'string', 'max:255'],
                'note' => ['nullable', 'string', 'max:1000'],
                'delivery_to_home' => ['sometimes', 'accepted'],
                'payment_cod' => ['sometimes', 'accepted'],
            ]);

            // kiểm tra giỏ hàng cũ, chống spam db
            $lastOrder = session('last_order', null);
            $currentOrderData = $validated;
            $currentOrderData['cart'] = $cart;
            if ($lastOrder && json_encode($lastOrder) === json_encode($currentOrderData)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn đã gửi đơn giống hệt vừa rồi, vui lòng đợi hoặc thay đổi thông tin.'
                ], 429);
            }

            if (!empty($cart)) {
                Order::create([
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'note' => $validated['note'] ?? null,
                    'delivery_to_home' => $request->boolean('delivery_to_home'),
                    'payment_cod' => $request->boolean('payment_cod'),
                ]);
                session(['last_order' => $currentOrderData]);
                session()->forget('cart');
                session()->save();
                return response()->json(['success' => true, 'message' => 'Đơn hàng đã được gửi thành công!', 'cart' => []]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn không có sản phẩm nào trong giỏ hàng!'
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đơn hàng thanh toán thất bại, vui lòng thử lại!'
            ], 500);
        }
    }
}
