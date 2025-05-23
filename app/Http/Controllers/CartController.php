<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Validation\ValidationException;
class CartController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $cart = session('cart', []);
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        return view('cart.index', compact('cart', 'totalPrice', 'totalQuantity', 'user'));
    }
    public function store(Request $request)
    {
        //validate $request
        $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'color' => 'required|string',
            'size' => 'required|string',
        ]);

        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);
        $variantKey = "{$product->id}-{$request->color}-{$request->size}";
        $quantity = (int) $request->quantity;
        try {
            //check nếu biến thể item đã tồn tại trong cart
            if (isset($cart[$variantKey])) {
                $cart[$variantKey]['quantity'] += $quantity;
            } else {
                $cart[$variantKey] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'img' => $product->img,
                    'quantity' => $quantity,
                    'color' => $request->color,
                    'size' => $request->size,
                ];
            }
            $cart[$variantKey]['subtotal'] = $cart[$variantKey]['price'] * $cart[$variantKey]['quantity'];
            $totalQuantity = array_sum(array_column($cart, 'quantity'));

            session()->put('cart', $cart);
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

    public function destroy(Request $request)
    {
        //validate $request
        $request->validate([
            'id' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);
        $cart = session()->get('cart', []);
        $variantKey = "{$request->id}-{$request->color}-{$request->size}";

        try {
            if (!isset($cart[$variantKey])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sản phẩm không tồn tại trong giỏ hàng',
                ], 404);
            }
            unset($cart[$variantKey]);
            session()->put('cart', $cart);
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
