@extends('layout.master')

@section('content')

<div class="container">
    <h3>Kết quả tìm kiếm cho: <span style="color: #FF4500;">"{{ $query }}"</span></h3>
    
    <div class="beta-products-list">
        <div class="beta-products-details">
            <p class="pull-left">{{ $products->total() }} sản phẩm được tìm thấy</p> <!-- Sửa từ count() thành total() để hiển thị tổng số sản phẩm -->
            <div class="clearfix"></div>
        </div>

        <div class="row">
            @php $stt = 0; @endphp
            @foreach($products as $product)
                @php $stt++; @endphp
                <div class="col-sm-3">
                    <div class="single-item">
                        @if($product->promotion_price != 0)
                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                            <a href="{{ route('banhang.chitiet', $product->id) }}">
                                <img src="{{ asset('source/image/product/'.$product->image) }}" alt="" height="250px">
                            </a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{ $product->name }}</p>
                            <p class="single-item-price" style="font-size: 15px; font-weight: bold;">
                                @if($product->promotion_price == 0)
                                    <span class="flash-sale">{{ number_format($product->unit_price) }} đồng</span>
                                @else
                                    <span class="flash-del">{{ number_format($product->unit_price) }} đồng</span>
                                    <span class="flash-sale">{{ number_format($product->promotion_price) }} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{ route('banhang.addtocart', $product->id) }}">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a class="beta-btn primary" href="{{ route('banhang.chitiet', $product->id) }}">
                                Chi tiết <i class="fa fa-chevron-right"></i>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @if($stt % 4 == 0)
                    <div class="space40">&nbsp;</div>
                @endif
            @endforeach
        </div>
        
        <div class="row">
            <div class="col-sm-12 text-center">
                <!-- Hiển thị phân trang -->
                {{ $products->links() }}
            </div>
        </div>

    </div> <!-- .beta-products-list -->
</div>

@endsection
