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
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        return view('cart.index', compact('cart', 'totalPrice', 'totalQuantity'));
    }
    public function addCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $cart = session()->get('cart', []);

        $variantKey = "{$product->id}-{$request->color}-{$request->size}";
        if (isset($cart[$variantKey])) {
            $cart[$variantKey]['quantity']++;
        } else {
            $cart[$variantKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img,
                'subtotal' => $product->price * $request->quantity,
                'quantity' => $request->quantity,
                'color' => $request->color,
                'size' => $request->size,
            ];
        }
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        session(['cart' => $cart]); // lưu session
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sản phẩm của bạn vào giỏ hàng',
            'totalQuantity' => $totalQuantity
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

        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return response()->json([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công',
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
        ]);
    }
}
