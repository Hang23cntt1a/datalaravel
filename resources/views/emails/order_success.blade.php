<h2>Xin chào {{ $order->username }},</h2>

<p>Cảm ơn bạn đã đặt hàng. Dưới đây là thông tin đơn hàng:</p>

<p><strong>Mã đơn hàng:</strong> #{{ $order->id }}</p>
<p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
<p><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }}đ</p>
<p><strong>Phương thức thanh toán:</strong> {{ $order->payment }}</p>

<h3>Chi tiết sản phẩm:</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->details as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->unit_price, 0, ',', '.') }}đ</td>
                <td>{{ number_format($item->unit_price * $item->quantity, 0, ',', '.') }}đ</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Ghi chú:</strong> {{ $order->note }}</p>
<p>Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng sớm nhất.</p>
<p>Trân trọng!</p>
