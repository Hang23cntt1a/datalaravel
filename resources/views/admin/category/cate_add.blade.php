@extends('admin.master')

@section('content')
<div id="page-wrapper">
<div class="container mt-4">
    <h2>Thêm loại sản phẩm</h2>

    {{-- Hiển thị lỗi nếu có --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Hiển thị thông báo thành công --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.cate.add.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Tên:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mô tả:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Hình ảnh:</label>
           
            <input type="file" class="form-control" name="image" onchange="previewImage(event)" required/>
        </div>
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
</div>
@endsection
