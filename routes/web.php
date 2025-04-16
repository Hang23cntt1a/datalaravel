<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ContactController;

///

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccessMail;
use App\Models\Order;
// Trang chủ
Route::get('/trangchu', [PageController::class, 'getIndex'])->name('banhang.index');

// Hiển thị danh sách sản phẩm
Route::get('/product', [PageController::class, 'index'])->name('banhang.product'); 

// Hiển thị chi tiết sản phẩm (chỉ giữ 1 route duy nhất)
Route::get('/chitiet/{id}', [PageController::class, 'getChiTiet'])->name('banhang.chitiet');

// Đăng ký
Route::get('/dangky',[PageController::class,'getSignin'])->name('getsignin');
Route::post('/dangky',[PageController::class,'postSignin'])->name('postsignin');

// Đăng nhập
Route::get('/dangnhap', [UserController::class, 'getLogin'])->name('getlogin');
Route::post('/dangnhap', [UserController::class, 'postLogin'])->name('postlogin');

// Đăng xuất
Route::get('/dangxuat', function () {
    Auth::logout();
    return redirect('/trangchu'); // Chuyển hướng về trang chủ sau khi đăng xuất
})->name('getlogout');

// tìm kiếm
Route::get('/search', [PageController::class, 'search'])->name('products.search');
Route::get('/product/{id}', [PageController::class, 'productDetail'])->name('product.detail');


// ADMIN

Route::get('/admin/dangnhap',[UserController::class,'getLogin'])->name('admin.getLogin');
Route::post('/admin/dangnhap',[UserController::class,'postLogin'])->name('admin.postLogin');
Route::get('/admin/logout', [PageController::class, 'getLogout'])->name('admin.getLogout');
// Định nghĩa route cho trang đăng nhập
Route::get('/banhang/login', [PageController::class, 'getLogin'])->name('banhang.login');
// Định nghĩa ADMIN đến trang cate_list
Route::get('admin/category', function () {
    return redirect()->route('admin.cate.list');
});




//////////////////////////  PHÂN QUYỀN CỦA ADMIN    ///////////////////////////////////////
Route::middleware(['auth', RoleMiddleware::class . ':1'])->group(function () {

    // USER
    Route::get('admin/users/list', [UserController::class, 'getUserlist'])->name('admin.user.list');
    Route::get('/users', [UserController::class, 'getUserList'])->name('users.getUserlist');
    Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/edit/{user}', [UserController::class, 'postUserEdit'])->name('users.postEdit');
    Route::get('/users/delete/{id}', [UserController::class, 'getUserDelete'])->name('users.delete');

    // CATEGORY ROUTES (Loại sản phẩm)
    Route::get('admin/category/list', [CategoryController::class, 'getCateList'])->name('admin.cate.list');
    Route::get('admin/category/add', [CategoryController::class, 'getCateAdd'])->name('admin.cate.add');
    Route::post('admin/category/add', [CategoryController::class, 'postCateAdd'])->name('admin.cate.add.post');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.cate.edit');
    Route::put('admin/category/edit/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.cate.edit.post');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.cate.delete');

    // PRODUCT ROUTES (Sản phẩm)
    Route::get('admin/products/list', [ProductController::class, 'getProList'])->name('admin.pro.list');
    Route::get('admin/products/add', [ProductController::class, 'getProAdd'])->name('admin.pro.add');
    Route::post('admin/products/add', [ProductController::class, 'postProAdd'])->name('products.postAdd');
    Route::get('admin/products/edit/{id}', [ProductController::class, 'getProEdit'])->name('admin.pro.edit');
    Route::put('admin/products/edit/{id}', [ProductController::class, 'postProEdit'])->name('admin.pro.edit.post');
    Route::delete('admin/products/delete/{id}', [ProductController::class, 'getProDelete'])->name('admin.pro.delete');

    
    ///??
    Route::get('/users/user_add', [UserController::class, 'getUserAdd'])->name('users.add');
    Route::post('/users/user_add', [UserController::class, 'postUserAdd'])->name('users.postAdd');
    Route::get('admin/users/add', [UserController::class, 'getUseradd'])->name('admin.user.add');


    // QUẢN LÝ ĐƠN HÀNG
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index')->middleware('list-order');
    Route::post('orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('admin.orders.update_status');
    Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/status/{status}', [OrderController::class, 'filterByStatus'])->name('admin.orders.filter');

    Route::post('/orders/{orderId}/approve', [OrderController::class, 'approveOrder'])->name('admin.orders.approve');
    Route::post('/admin/orders/update-status/{id}', [OrderController::class, 'updateStatus'])->name('admin.orders.update_status');

    // QUẢN LÝ SLIDE
    Route::get('slide', [SlideController::class, 'index'])->name('admin.slides.index');
    Route::get('slide/create', [SlideController::class, 'create'])->name('admin.slides.create');
    Route::post('slide/store', [SlideController::class, 'store'])->name('admin.slides.store');
    Route::get('slide/edit/{id}', [SlideController::class, 'edit'])->name('admin.slides.edit');
    Route::put('/slide/update/{id}', [SlideController::class, 'update'])->name('admin.slides.update');
    Route::delete('admin/slides/{id}', [SlideController::class, 'destroy'])->name('admin.slides.destroy');

    });



// Phân quyền cho riêng user
Route::middleware(['auth', RoleMiddleware::class. ':3'])->group(function () {
    // Thêm sản phẩm vào giỏ hàng
    Route::get('/add-to-cart/{id}', [PageController::class, 'addToCart'])->name('banhang.addtocart');
    Route::get('/del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');
    Route::post('/cart/update', [PageController::class, 'updateCart'])->name('cart.update');

    Route::get('/cartt', [CartController::class, 'getCart'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.updatee');

    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

    Route::get('/checkout', [PageController::class, 'getCheckout'])->name('banhang.checkout');
    Route::get('dat-hang', [PageController::class, 'getCheckout'])->name('banhang.getdathang');
    Route::post('dat-hang', [PageController::class, 'postCheckout'])->name('banhang.postdathang');



});


/// EMAILS
Route::get('/input-email',[EmailController::class,'getInputEmail'])->name('getInputEmail');
Route::post('/input-email', [EmailController::class, 'postInputEmail'])->name('postInputEmail');

// web.php
Route::get('/category/{id}', [CategoryController::class, 'showCategory'])->name('category.show');

// Định nghĩa route cho trang chi tiết sản phẩm
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

