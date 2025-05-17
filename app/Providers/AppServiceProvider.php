<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $quanAoCategories = Category::where('type', 'quan-ao')->get();
            $phuKienCategories = Category::where('type', 'phu-kien')->get();
            $cart = session('cart', []);
            $view->with([
                'quanAoCategories' => $quanAoCategories,
                'phuKienCategories' => $phuKienCategories,
                'cart' => $cart
            ]);
        });
    }
}
