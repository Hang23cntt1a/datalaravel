@extends('layouts.master')

@section('content')
<div class="container">
    <h3 class="my-4">Sản phẩm thuộc loại: <strong>{{ $category->name }}</strong></h3>

    <div class="row">
        @foreach($products as $new_product)
        <div class="col-sm-3 mb-4">
            <div class="single-item">
                @if($new_product->promotion_price != 0)
                <div class="ribbon-wrapper">
                    <div class="ribbon sale">Sale</div>
                </div>
                @endif

                <div class="single-item-header">
                    <a href="{{ route('banhang.chitiet', $new_product->id) }}">
                        <img src="{{ asset('source/image/product/' . $new_product->image) }}" alt="{{ $new_product->name }}" height="200px" width="100%">
                    </a>
                </div>

                <div class="single-item-body">
                    <p class="single-item-title">{{ $new_product->name }}</p>
                    <p class="single-item-price">
                        @if($new_product->promotion_price == 0)
                            <span class="flash-sale">{{ number_format($new_product->unit_price) }} đồng</span>
                        @else
                            <span class="flash-del">{{ number_format($new_product->unit_price) }} đồng</span>
                            <span class="flash-sale">{{ number_format($new_product->promotion_price) }} đồng</span>
                        @endif
                    </p>
                </div>

                <div class="single-item-caption">
                    @if(Auth::check())
                        <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $new_product->id) }}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    @else
                        <a class="add-to-cart pull-left" href="#" onclick="alert('Bạn cần đăng nhập để thêm vào giỏ hàng')">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    @endif

                    <a class="beta-btn primary" href="{{ route('banhang.chitiet', $new_product->id) }}">
                        Chi tiết <i class="fa fa-chevron-right"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
