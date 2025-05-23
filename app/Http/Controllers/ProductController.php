<?php

namespace App\Http\Controllers;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProducts(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('shop.index', compact('products', 'category'));
    }

    public function productDetails(Product $product)
    {
        $product = Product::with('category')
            ->where('slug', $product->slug)->firstOrFail();
            Debugbar::info($product->toArray());
        return view('shop.details', compact('product'));
    }
}
