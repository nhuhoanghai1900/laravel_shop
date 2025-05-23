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
            $clothesCategories = Category::where('type', 'quan-ao')->get();
            $accessoryCategories = Category::where('type', 'phu-kien')->get();
            $cart = session('cart', []);
            $view->with([
                'clothesCategories' => $clothesCategories,
                'accessoryCategories' => $accessoryCategories,
                'cart' => $cart
            ]);
        });
    }
}
