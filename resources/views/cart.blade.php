@extends('layouts.master')

@section('csseditgiohang')
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/huong-style.css') }}">
    

@endsection

@section('content')
<div class="container">
    <h2 style="font-family: Time new roman;">Giỏ hàng</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(Session::has('cart') && count(Session::get('cart')->items) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá khuyến mãi</th> {{-- Thêm cột mới --}}
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Session::get('cart')->items as $id => $item)
                    <tr>
                        <td>{{ $item['item']->name }}</td>
                        <td>{{ number_format($item['item']->unit_price, 0, ',', '.') }}đ</td>
                        <td>
                            @if($item['item']->promotion_price > 0)
                                {{ number_format($item['item']->promotion_price, 0, ',', '.') }}đ
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('cart.updatee', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['qty'] }}" min="1" class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-1" style="font-family: Time new roman;">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($item['totalPrice'], 0, ',', '.') }}đ</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end">
            <h4 style="font-family: Time new roman;">Tổng tiền: {{ number_format(Session::get('cart')->totalPrice, 0, ',', '.') }}đ</h4>
            <a href="{{ route('cart.clear') }}" class="btn btn-warning">Xóa toàn bộ giỏ hàng</a>
            <a href="{{ url('dat-hang') }}" class="btn btn-success">Đặt hàng</a>
        </div>

    @else
        <p>Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection

@section('jseditgiohang')
    <script src="{{ asset('source/assets/dest/js/jquery.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/animo/Animo.js') }}"></script>
    <script src="{{ asset('source/assets/dest/vendors/dug/dug.js') }}"></script>
    <script src="{{ asset('source/assets/dest/js/scripts.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            var url = window.location.href;
            $(".main-menu a").each(function() {
                if (url == (this.href)) {
                    $(this).closest("li").addClass("active");
                    $(this).parents('li').addClass('parent-active');
                }
            });
        });

        jQuery(document).ready(function($) {
            'use strict';
            jQuery('#style-selector').animate({ left: '-213px' });
            jQuery('#style-selector a.close').click(function(e){
                e.preventDefault();
                var div = jQuery('#style-selector');
                if (div.css('left') === '-213px') {
                    jQuery('#style-selector').animate({ left: '0' });
                    jQuery(this).removeClass('icon-angle-left').addClass('icon-angle-right');
                } else {
                    jQuery('#style-selector').animate({ left: '-213px' });
                    jQuery(this).removeClass('icon-angle-right').addClass('icon-angle-left');
                }
            });
        });
    </script>
@endsection
