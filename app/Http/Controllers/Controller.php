<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function getChiTiet($sanpham_id) {
        $sanpham = Product::find($sanpham_id);
        return view('chitiet', compact('sanpham'));
    }
    
    //
}
