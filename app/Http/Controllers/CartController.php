<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        // Lấy giỏ hàng từ session, nếu không có thì tạo mới giỏ hàng
        $cart = Session::get('cart') ?? new Cart();
        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        // Tìm sản phẩm theo id
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Lấy giỏ hàng cũ từ session nếu có
        $oldCart = Session::get('cart') ?? null;
        $cart = new Cart($oldCart);
        // Thêm sản phẩm vào giỏ hàng
        $cart->add($product, $id);

        // Lưu giỏ hàng vào session
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function removeFromCart($id)
    {
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart');
        if ($cart) {
            // Xóa sản phẩm khỏi giỏ
            $cart->remove($id);
            // Cập nhật giỏ hàng vào session
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function updateCart(Request $request, $id)
    {
        // Lấy số lượng sản phẩm từ input, mặc định là 1
        $quantity = $request->input('quantity', 1);
    
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart');
    
        // Nếu giỏ hàng tồn tại và sản phẩm có trong giỏ
        if ($cart && isset($cart->items[$id])) {
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $cart->updateQuantity($id, $quantity);
    
            // Lưu lại giỏ hàng vào session
            Session::put('cart', $cart);
        }
    
        // Quay lại với thông báo thành công
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công.');
    }
    

    public function clearCart()
    {
        // Xóa toàn bộ giỏ hàng trong session
        Session::forget('cart');
        return redirect()->back()->with('success', 'Đã xóa toàn bộ giỏ hàng.');
    }
}
