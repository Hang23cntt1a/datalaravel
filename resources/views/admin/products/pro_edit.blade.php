@extends('admin.master')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.pro.edit.post', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" value="{{ old('name', $product->name) }}" placeholder="Please Enter Product Name" required/>
                            </div>
                            <div class="form-group">
                            <label>Danh mục</label>
                            <select name="id_type" class="form-control" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả </label>
                                <input class="form-control" name="description" value="{{ old('description', $product->description) }}" placeholder="Please Enter Product Description" required/>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá </label>
                                <input class="form-control" type="number" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}" placeholder="Please Enter Product Unit Price" required/>
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" type="number" name="promotion_price" value="{{ old('promotion_price', $product->promotion_price) }}" placeholder="Please Enter Product Promotion Price"/>
                            </div>
                            <div class="form-group">
                                <label>Đơn vị sản phẩm</label>
                                <input class="form-control" name="unit" value="{{ old('unit', $product->unit) }}" placeholder="Please Enter Product Unit" required/>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                
                                <!-- Hiển thị ảnh hiện tại nếu có -->
                                @if($product->image)
                                    <div>
                                        <label>Current Image:</label>
                                        <img src="{{ asset('source/image/product/'.$product->image) }}" id="current-image" width="100px" height="60px" alt="Product Image">
                                    </div>
                                @endif

                                <input type="file" class="form-control" name="image" onchange="previewImage(event)"/>
                                
                                <!-- Hiển thị ảnh mới khi chọn -->
                                <div id="image-preview-container" style="margin-top: 10px;">
                                    <img id="image-preview" src="#" style="display: none; width: 100px; height: 60px;" alt="Preview Image">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <script>
            // JavaScript function to preview the selected image
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('image-preview');
                    output.src = reader.result;
                    output.style.display = 'block'; // Show the image preview
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
@endsection
