<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;

class PageController extends Controller
{
    // Trang chủ
    public function getIndex() {
        $slides = Slide::all();
        $new_products = Product::where('new', 1)->paginate(8);
        $top_products = Product::where('top', 1)->paginate(8);
        $promotion_products = Product::where('promotion_price', '<>', 0)->paginate(4);
        $cart = Session::get('cart', new Cart());
    
        return view('index', compact('slides', 'new_products', 'top_products', 'promotion_products', 'cart'));
    }
    

    // Hiển thị chi tiết sản phẩm
    public function getChiTiet($id) {
        $product = Product::find($id);
        if (!$product) {
            abort(404); // Trả về lỗi 404 nếu không tìm thấy sản phẩm
        }
        return view('banhang.product', compact('product')); // Trả về view product.blade.php
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id) {
        $product = Product::find($id);
        if (!$product) {
            return back()->with('error', 'Sản phẩm không tồn tại');
        }
    
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        
        Session::put('cart', $cart); // Quan trọng: Lưu giỏ hàng vào Session
        return back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function delCartItem($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else Session::forget('cart');
        return redirect()->back();
    }

    public function getCheckout() {
        $cart = Session::get('cart', new Cart());
    
        return view('banhang.checkout', [
            'productCarts' => $cart->items,
            'cart' => $cart,
            'totalPrice' => $cart->totalPrice
        ]);
    }
    

    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }
        $cart=Session::get('cart');
        $customer=new Customer();
        $customer->name=$request->input('name');
        $customer->gender=$request->input('gender');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->phone_number=$request->input('phone_number');
        $customer->note=$request->input('notes');
        $customer->save();

        $bill=new Bill();
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$request->input('payment_method');
        $bill->note=$request->input('notes');
        $bill->save();

        foreach($cart->items as $key=>$value)
        {
            $bill_detail=new BillDetail();
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('success','Đặt hàng thành công');

    }
}