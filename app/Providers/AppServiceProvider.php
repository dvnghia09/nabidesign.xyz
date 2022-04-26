<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('product-detail', function ($view) {
            $cart = new Cart();
            $totalQuantity = $cart->getTotalQuantity();
            $view->with([
                'totalQuantity'=>$totalQuantity,
                
            ]);
        });
    }
}
