<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('components.header', function ($view) {
            $loai_sp = ProductType::all();
            $view->with('loai_sp', $loai_sp);
        });

        view()->composer('pages.product_type', function ($view) {
            $product_new = Product::where('new', 1)->orderBy('id', 'DESC')->skip(1)->take(8)->get();
            $view->with('product_new', $product_new);
        });
    }
}
