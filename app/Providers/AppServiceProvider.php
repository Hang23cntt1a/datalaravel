<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category; // THÊM DÒNG NÀY
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // View composer cho layouts.header và checkout
        View::composer(['layouts.header', 'checkout'], function ($view) {
            $cart = Session::has('cart') ? Session::get('cart') : new Cart();
            $categories = Category::all(); // LẤY TẤT CẢ LOẠI SẢN PHẨM

            $view->with([
                'cart' => $cart,
                'productCarts' => $cart->items ?? [],
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty,
                'categories' => $categories // TRUYỀN VÀO VIEW
            ]);
        });
    }
}
