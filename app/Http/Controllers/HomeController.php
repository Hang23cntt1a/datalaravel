<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide; // Import model Slide
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách tất cả slide từ database
        $slides = Slide::all();
        $categories = Category::all(); // Lấy danh sách loại sản phẩm

        // Trả dữ liệu về view index.blade.php
        return view('index', compact('slides', 'categories'));
    }
}

