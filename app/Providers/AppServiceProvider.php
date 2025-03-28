<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        View::composer(['layouts.header', 'checkout'], function ($view) {
            $cart = Session::has('cart') ? Session::get('cart') : new Cart();
            $view->with([
                'cart' => $cart,
                'productCarts' => $cart->items ?? [], // Đảm bảo mặc định là mảng rỗng
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        });
    }
}