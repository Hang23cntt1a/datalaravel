<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        return "Thêm sản phẩm có ID: " . $id . " vào giỏ hàng";
    }
}
