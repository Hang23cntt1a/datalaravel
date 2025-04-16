<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật trạng thái đơn hàng</title>
</head>
<body>
    <h1>Chào {{ $order->username }}</h1>
    <p>Trạng thái đơn hàng của bạn đã được cập nhật.</p>
    <p><strong>Trạng thái mới: </strong>{{ $order->status }}</p>
    <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
</body>
</html>
