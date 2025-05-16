<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = session('cart', []);
        // Debugbar::info($cart);

        //tổng giá
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        //tổng số lượng
        $totalQuantity = array_reduce(
            $cart,
            fn($numbers, $item) => $numbers += $item['quantity'],
            0
        );
        return view('cart.index', compact('cart', 'totalPrice', 'totalQuantity'));
    }
    public function addCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $cart = session()->get('cart', []);

        //tạo biến thể mới
        $variantKey = "{$product->id}-{$request->color}-{$request->size}";
        if (isset($cart[$variantKey])) {
            $cart[$variantKey]['quantity']++;
        } else {
            $cart[$variantKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img,
                'quantity' => $request->quantity,
                'color' => $request->color,
                'size' => $request->size,
            ];
        }
        session(['cart' => $cart]); // lưu session
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sản phẩm của bạn vào giỏ hàng'
        ]);
    }

    public function updateCart()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công tổng tiền',
            'totalPrice' => $totalPrice
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $variantKey = "{$request->id}-{$request->color}-{$request->size}";

        if (isset($cart[$variantKey])) {
            unset($cart[$variantKey]);
            session()->put('cart', $cart);
        }
        //tổng số lượng
        $totalQuantity = array_reduce(
            $cart,
            fn($numbers, $item) => $numbers += $item['quantity'],
            0
        );
        return response()->json([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công',
            'cartCount' => count($cart),
            'totalQuantity' => $totalQuantity
        ]);
    }
}
