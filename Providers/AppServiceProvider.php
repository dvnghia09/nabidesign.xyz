<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\Cart;
use App\Models\Category;
use App\Models\CategorySub;

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
        view()->composer('*', function ($view) {
            $category = Category::all()->sortByDesc("id");
            $cart = new Cart();
            $totalQuantity = $cart->getTotalQuantity();

            $cateSub = CategorySub::all();

            $view->with([
                'totalQuantity'=>$totalQuantity,
                'category'     => $category,
                'cateSub'      =>  $cateSub,
             ]);
        });
    }
}
