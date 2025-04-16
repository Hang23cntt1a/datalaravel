@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <h1>Danh sách Slide</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Link</th>
                <th>Hình ảnh</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slides as $slide)
                <tr>
                    <td>{{ $slide->id }}</td>
                    <td>{{ $slide->link }}</td>
                    <td><img src="{{  asset('storage/images/' . $slide->image)}}" width="100" alt="Slide"></td>
                    <td>
                        <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
