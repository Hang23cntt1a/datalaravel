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
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Order;
use App\Mail\OrderSuccessMail;
use App\Mail\OrderStatusUpdatedMail;

class PageController extends Controller
{
    // Trang chủ
    public function getIndex() {
        $slides = Slide::all();
        $new_products = Product::where('new', 1)->get();
        $top_products = Product::where('top', 1)->get();
        $promotion_products = Product::where('promotion_price', '<>', 0)->get();
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
    

   

    public function postCheckout(Request $request)
{
    if (!Session::has('cart')) {
        return redirect()->back()->with('error', 'Giỏ hàng trống!');
    }

    $cart = Session::get('cart');

    // 1. Tạo đơn hàng (bảng orders)
    $order = new Order();
    $order->IDuser = Auth::id(); // Lấy ID người dùng đã đăng nhập

    // Lưu thông tin khách hàng từ form
    $order->username = $request->input('name');
    $order->email = $request->input('email');
    $order->address = $request->input('address');
    $order->phone = $request->input('phone_number');

    // Các thông tin đơn hàng
    $order->ship = 20000; // bạn có thể thay bằng phí ship thực tế
    $order->total = $cart->totalPrice;
    $order->payment = $request->input('payment_method');
    $order->note = $request->input('notes');
    $order->status = 'chưa duyệt';
    $order->save();

    // 2. Tạo chi tiết đơn hàng
    foreach ($cart->items as $key => $value) {
        $bill_detail = new BillDetail();
        $bill_detail->order_id = $order->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = $value['price'] / $value['qty'];
        $bill_detail->save();
    }

    // 3. Xóa giỏ hàng
    Session::forget('cart');

    return redirect()->route('banhang.checkout')->with('success', 'Đặt hàng thành công!');
}

    


////////////////////////////////////////////////////////////////////////////////////////////////

// ĐĂNG KÝ
public function getSignin(){
    return view('banhang.dangky');
}

public function postSignin(Request $req){
    $validated = $req->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:20',
        'username' => 'required',
        'repassword' => 'required|same:password'
    ], [
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Không đúng định dạng email',
        'email.unique' => 'Email đã có người sử dụng',
        'password.required' => 'Vui lòng nhập mật khẩu',
        'repassword.same' => 'Mật khẩu không giống nhau',
        'password.min' => 'Mật khẩu ít nhất 6 ký tự'
    ]);

    $user = new User();
    $user->username = $req->username;
    $user->email = $req->email;
    $user->password = Hash::make($req->password);
    $user->phone = $req->phone;
    $user->address = $req->address;
    $user->role = 3;  // khách hàng
    $user->save();

    return redirect()->back()->with('success', 'Tạo tài khoản thành công');
}


public function postSignup(Request $req)
{
    $user = new User();
    $user->full_name = $req->fullname;
    $user->email = $req->email;
    $user->password = Hash::make($req->password);
    $user->phone = $req->phone;
    $user->address = $req->address;
    $user->level = 3;  // 1: Admin, 2: Kỹ thuật, 3: Khách hàng
    $user->save();

    return redirect()->back()->with('success', 'Tạo tài khoản thành công');
}


    // ĐĂNG NHẬP
   
public function getLogin() {
    return view('banhang.login');
}

public function postLogin(Request $req) {
    $this->validate($req, [
        'email' => 'required|email',
        'password' => 'required|min:6|max:20'
    ], [
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Không đúng định dạng email',
        'password.required' => 'Vui lòng nhập mật khẩu',
        'password.min' => 'Mật khẩu ít nhất 6 ký tự'
    ]);

    $credentials = ['email' => $req->email, 'password' => $req->password];

    if (Auth::attempt($credentials)) {
        return redirect('/trangchu')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
    } else {
        return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
    }
}
// ĐĂNG XUẤT
public function getLogout(Request $request)
{
    Auth::logout();  // Đăng xuất người dùng
    $request->session()->invalidate();  // Hủy session
    $request->session()->regenerateToken();  // Tạo lại token CSRF mới

    return redirect()->route('banhang.login');  // Chuyển hướng đến trang đăng nhập
}
// TÌM KIẾM


public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $products = Product::where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%')
                ->get();

    return view('banhang.search_results', compact('products', 'keyword'));
}

public function productDetail($id)
{
    $product = Product::findOrFail($id);
    return view('banhang.product', compact('product'));
}

///////////////////////////////////////////////////////

public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $statusConfig = config('order.status');

    // Tìm key tương ứng với trạng thái hiện tại
    $currentKey = collect($statusConfig)->search(function ($item) use ($order) {
        return $item['label'] === $order->status;
    });

    $nextAllowed = $statusConfig[$currentKey]['next'] ?? [];

    if (in_array($request->status, $nextAllowed)) {
        $order->status = $request->status;
        $order->save();

        // Gửi email cho khách hàng
        Mail::to('hhangg1709@gmail.com')->send(new OrderStatusUpdatedMail($order));

        return redirect()->back()->with('success', 'Cập nhật trạng thái và gửi email thành công.');
    }

    return redirect()->back()->with('error', 'Trạng thái không hợp lệ.');
}

//////////////////////////////////////////////////////
public function postDatHang(Request $req)
{
    // Kiểm tra có giỏ hàng không
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    if (!$oldCart) {
        return redirect()->back()->with('error', 'Không có sản phẩm trong giỏ hàng!');
    }

    $cart = new Cart($oldCart);

    // 1. Tạo đơn hàng
    $order = new Order();
    $order->name = $req->name;
    $order->gender = $req->gender;
    $order->email = $req->email;
    $order->address = $req->address;
    $order->phone_number = $req->phone_number;
    $order->notes = $req->notes;
    $order->total = $cart->totalPrice;
    $order->payment = $req->payment_method;
    $order->date_order = now();
    $order->save();

    // 2. Lưu chi tiết đơn hàng (BillDetail)
    foreach ($cart->items as $product_id => $item) {
        $billDetail = new BillDetail();
        $billDetail->order_id = $order->id;
        $billDetail->product_id = $product_id;
        $billDetail->quantity = $item['qty'];
        $billDetail->unit_price = $item['price'] / $item['qty'];
        $billDetail->save();
    }

    // 3. Gửi email
    try {
        $billDetails = BillDetail::where('order_id', $order->id)->get();  // Dùng BillDetail thay vì OrderDetail
        Mail::to($order->email)->send(new OrderSuccessMail($order, $billDetails));  // Truyền BillDetail vào email
        session()->flash('success', 'Đặt hàng thành công! Kiểm tra email của bạn.');
    } catch (\Exception $e) {
        \Log::error('Lỗi gửi email: ' . $e->getMessage());
        session()->flash('error', 'Không thể gửi email xác nhận. Vui lòng thử lại sau.');
    }

    // 4. Xoá giỏ hàng
    Session::forget('cart');

    return redirect()->back();
}



}