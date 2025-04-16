@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <h1>Sửa Slide</h1>

    <form action="{{ route('admin.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control" id="link" value="{{ $slide->link }}" required>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh (Chọn nếu thay đổi)</label>
            <input type="file" name="image" class="form-control" id="image">
            @if($slide->image)
            <img src="{{ asset('storage/images/' . $slide->image) }}" alt="Slide">
            @endif

        </div>

        <button type="submit" class="btn btn-warning">Cập nhật Slide</button>
    </form>
</div>
@endsection
