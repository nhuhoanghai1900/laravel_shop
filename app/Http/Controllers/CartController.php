<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Validation\ValidationException;
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
        try {
            $product = Product::where('id', $request->id)->first();
            $cart = session()->get('cart', []);

            $variantKey = "{$product->id}-{$request->color}-{$request->size}";
            if (isset($cart[$variantKey])) {
                $cart[$variantKey]['quantity'] = (int) $cart[$variantKey]['quantity'] + (int) $request->quantity;
                $cart[$variantKey]['subtotal'] = $cart[$variantKey]['price'] * $cart[$variantKey]['quantity'];
            } else {
                $cart[$variantKey] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'img' => $product->img,
                    'subtotal' => $product->price * (int) $request->quantity,
                    'quantity' => (int) $request->quantity,
                    'color' => $request->color,
                    'size' => $request->size,
                ];
            }
            $totalQuantity = array_sum(array_column($cart, 'quantity'));
            session()->put('cart', $cart);
            // lưu session
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm sản phẩm vào giỏ hàng',
                'totalQuantity' => $totalQuantity
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Thêm sản phẩm thất bại',
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

    public function removeFromCart(Request $request)
    {
        try {
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
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Xóa sản phẩm thất bại',
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
