@extends('layouts.master')

@section('content')
    <div class="container">
        <h2 style="margin: 20px 0;">Kết quả tìm kiếm cho: "{{ $keyword }}"</h2>

        @if($products->isEmpty())
            <p>Không tìm thấy sản phẩm nào.</p>
        @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-3">
                        <div class="single-item">
                            @if($product->promotion_price != 0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                            @endif

                            <div class="single-item-header">
                                <a href="{{ route('banhang.chitiet', $product->id) }}">
                                    <img src="{{ asset('source/image/product/' . $product->image) }}" alt="{{ $product->name }}" height="200px" width="250px">
                                </a>
                            </div>

                            <div class="single-item-body">
                                <p class="single-item-title">{{ $product->name }}</p>
                                <p class="single-item-price">
                                    @if($product->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($product->unit_price) }} đồng</span>
                                    @else
                                        <span class="flash-del">{{ number_format($product->unit_price) }} đồng</span>
                                        <span class="flash-sale">{{ number_format($product->promotion_price) }} đồng</span>
                                    @endif
                                </p>
                            </div>

                            <div class="single-item-caption">
                                @if(Auth::check())
                                    <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $product->id) }}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                @else
                                    <a class="add-to-cart pull-left" onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng!')">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                @endif

                                <a class="beta-btn primary" href="{{ route('banhang.chitiet', $product->id) }}">
                                    Chi tiết <i class="fa fa-chevron-right"></i>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
