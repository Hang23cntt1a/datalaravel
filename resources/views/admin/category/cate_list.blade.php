@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Mục
                    <small>Danh sách</small>
                </h1>
            </div>

            <!-- Hiển thị thông báo thành công -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $cate)
                    <tr align="center">
                        <td style="text-align: center; vertical-align: middle;">{{ $cate->id }}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $cate->name }}</td>

                        <!-- Khung mô tả rộng 400px, xuống dòng nếu dài -->
                        <td style="max-width: 400px; white-space: normal; word-break: break-word; ">
                            {{ $cate->description }}
                        </td>

                        <td style="text-align: center; vertical-align: middle;">
                            <img src="{{ asset('source/image/product/' . $cate->image) }}" width="100">
                        </td>
                        <td style="text-align: center; vertical-align: middle;  " >
                            <a href="{{ route('admin.cate.edit', ['id' => $cate->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i> Sửa
                            </a>
                            <a href="{{ route('admin.cate.delete', $cate->id) }}" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
