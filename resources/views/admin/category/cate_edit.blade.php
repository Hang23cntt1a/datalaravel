@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>Chỉnh sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.cate.edit.post', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" name="name" value="{{ old('name', $category->name) }}" placeholder="Nhập tên danh mục" required/>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="description" placeholder="Nhập mô tả" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="form-group">
                                <label>Hình ảnh</label>
                                
                                <!-- Hiển thị ảnh hiện tại nếu có -->
                                @if($category->image)
                                    <div>
                                        <label>Current Image:</label>
                                        <img src="{{ asset('source/image/product/'.$category->image) }}" id="current-image" width="100px" height="60px" alt="Product Image">
                                    </div>
                                @endif

                                <input type="file" class="form-control" name="image" onchange="previewImage(event)"/>
                                
                                <!-- Hiển thị ảnh mới khi chọn -->
                                <div id="image-preview-container" style="margin-top: 10px;">
                                    <img id="image-preview" src="#" style="display: none; width: 100px; height: 60px;" alt="Preview Image">
                                </div>
                            </div>
                            

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="reset" class="btn btn-secondary">Làm lại</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

{{-- Script preview ảnh --}}
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('image-preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
