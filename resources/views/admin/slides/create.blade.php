@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <h1>Thêm Slide Mới</h1>

    <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control" id="link" required>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Lưu Slide</button>
    </form>
</div>  
@endsection
