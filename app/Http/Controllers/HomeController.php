<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import model Product

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách tất cả sản phẩm từ database
        $products = Product::all();

        // Trả dữ liệu về view index.blade.php
        return view('index', compact('products'));
    }
}
