<?php
;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Trang chủ
Route::get('/trangchu', [PageController::class, 'getIndex'])->name('banhang.index');

// Hiển thị danh sách sản phẩm
Route::get('/product', [PageController::class, 'index'])->name('banhang.product'); 

// Hiển thị chi tiết sản phẩm (chỉ giữ 1 route duy nhất)
Route::get('/chitiet/{id}', [PageController::class, 'getChiTiet'])->name('banhang.chitiet');

// Thêm sản phẩm vào giỏ hàng
Route::get('/add-to-cart/{id}', [PageController::class, 'addToCart'])->name('banhang.addtocart');

Route::get('/dat-hang', [PageController::class, 'getCheckout'])->name('banhang.getdathang');

Route::get('/del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');

Route::get('/checkout',[PageController::class,'getCheckout'])->name('banhang.getdathang');
Route::post('/checkout',[PageController::class,'postCheckout'])->name('banhang.postdathang');


