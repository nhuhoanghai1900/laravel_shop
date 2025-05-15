<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function addCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }

        $cart = session()->get('cart', []);
        //tạo biến thể mới
        $variantKey = "{$product->id}-{$request->color}-{$request->size}";
        //kiểm tra variant của sản phẩm tồn tại
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
        return redirect()->route('cart.show')->with('success', 'Đã thêm vào giỏ hàng');
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $variantKey = "{$request->id}-{$request->color}-{$request->size}";

        if (isset($cart[$variantKey])) {
            unset($cart[$variantKey]);
            session()->put('cart', $cart);
        }
        return response()->json([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công',
            'cartCount' => count($cart),
        ]);
    }
}
