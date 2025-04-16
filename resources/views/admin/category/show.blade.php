@extends('admin.master')

@section('content')
    <h1>Sản phẩm thuộc loại: {{ $category->name }}</h1>

    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Giá: {{ $product->price }}</p>
                <a href="{{ route('product.show', $product->id) }}">Xem chi tiết</a>
            </div>
        @endforeach
    </div>
@endsection
