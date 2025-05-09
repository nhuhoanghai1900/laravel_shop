<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use function Laravel\Prompts\error;

class ProductController extends Controller
{
    public function getByCategory($slug, Request $request)
    {
        // Lấy giá trị của categoryId từ query string
        $categoryId = $request->query('category_id');
        if (!$categoryId) {
            return response()->json(['error' => 'Category ID is required'], 400);
        }

        // eloquent relationship
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $categoryName = $category->name;
        $products = $category->products;
        return view('shop.index', compact('products', 'categoryName'));
    }
}
