<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


use App\Models\Order;
use App\Models\BillDetail;
use Illuminate\Support\Facades\Auth;

use App\Mail\OrderSuccessMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdated; 



use App\Mail\OrderStatusUpdatedMail;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
{
    $orders = Order::orderByDesc('id')->paginate(10);

    foreach ($orders as $order) {
        $order->statusOptions = $this->getAvailableStatusOptions($order->status);
    }

    return view('orders.index', compact('orders'));
}


    public function updateStatus(Request $request, $id)
{
    $order = $this->order->findOrFail($id);
    $order->update(['status' => $request->status]);

    return response()->json(['message' => 'success'], Response::HTTP_OK);
}

public function filterByStatus($status)
{
    $statusMap = [
        'chua-duyet'=> 'Chưa duyệt',
        'duyet' => 'Duyệt',
        'dang-giao' => 'Đang giao',
        'da-giao' => 'Đã giao',
        'huy' => 'Hủy',
    ];

    // Lấy trạng thái cần lọc từ mảng map
    $dbStatus = $statusMap[$status] ?? $status;

    // Lọc các đơn hàng theo trạng thái
    $orders = Order::where('status', $dbStatus)->paginate(10);
    
    foreach ($orders as $order) {
        $order->statusOptions = $this->getAvailableStatusOptions($order->status);
    }

    return view('orders.index', compact('orders', 'status'));
}

private function getAvailableStatusOptions($currentStatus)
{
     $transitions = [
        'chưa duyệt' => ['Duyệt', 'Hủy'],
        'Duyệt' => ['Đang giao', 'Hủy'],
        'Đang giao' => ['Đã giao', 'Hủy'],
        'Đã giao' => [],
        'Hủy' => [ 'Duyệt', 'Đang giao', 'Đã giao'],
    ];

    return $transitions[$currentStatus] ?? [];
}



public function storeOrder(Request $request)
{
    // 1. Tạo đơn hàng mới
    $order = new Order();
    $order->username = $request->username;
    $order->email = $request->email;
    $order->address = $request->address;
    $order->phone = $request->phone;
    $order->note = $request->note;
    $order->payment = $request->payment;
    $order->total = $this->getTotal(); // tính tổng từ giỏ hàng
    $order->ship = 0; // Có thể tính phí vận chuyển nếu cần
    $order->status = 0; // Trạng thái đơn hàng (mới)
    $order->iduser = auth()->id(); // ID người dùng (nếu đã đăng nhập)
    $order->save();

    // 2. Lưu chi tiết đơn hàng
    foreach (Cart::content() as $item) {
        BillDetail::create([
            'order_id' => $order->id, // Lưu ID đơn hàng
            'id_product' => $item->id, // Sửa lại cột id_priduct thành id_product
            'quantity' => $item->qty,  // Số lượng
            'unit_price' => $item->price, // Đơn giá
        ]);
    }

    // 3. Nạp lại quan hệ để gửi email
    $order->load('details.product'); // Nạp chi tiết và sản phẩm liên quan

    // 4. Gửi email
    try {
        Mail::to($order->email)->send(new OrderSuccessMail($order));
    } catch (\Exception $e) {
        Log::error('Lỗi gửi email: ' . $e->getMessage());
        return redirect()->route('home')->with('error', 'Đặt hàng thành công, nhưng có lỗi khi gửi email.');
    }
    
}



// public function update(Request $request, $id)
// {
//     $order = Order::findOrFail($id);
//     $order->status = $request->status;
//     $order->save();

//     // Gửi email đến địa chỉ mặc định
//     Mail::to('hhangg1709@gmail.com')->send(new OrderStatusUpdatedMail($order));

//     return redirect()->back()->with('success', 'Cập nhật trạng thái và gửi email thành công.');
// }



public function updateOrderStatus(Request $request, $id)
{
    // Lấy đơn hàng từ cơ sở dữ liệu
    $order = Order::findOrFail($id);

    // Cập nhật trạng thái đơn hàng
    $order->status = $request->status;
    $order->save();

    // Gửi email thông báo cho khách hàng
    Mail::to($order->email)->send(new OrderStatusUpdated($order));

    // Quay lại với thông báo thành công
    return redirect()->route('orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công và email đã được gửi.');
}


}




