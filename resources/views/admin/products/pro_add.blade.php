@extends('admin.master')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('products.postAdd') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="name" placeholder="Please Enter Product Name" required/>
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
                            <label>Mô tả</label>
                            <input class="form-control" name="description" placeholder="Please Enter Product Description" required/>
                        </div>
                        <div class="form-group">
                            <label>Đơn giá</label>
                            <input class="form-control" type="number" name="unit_price" placeholder="Please Enter Product Unit Price" required/>
                        </div>
                        <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input class="form-control" type="number" name="promotion_price" placeholder="Please Enter Product Promotion Price"/>
                        </div>
                        <div class="form-group">
                            <label>Đơn vị sản phẩm</label>
                            <input class="form-control" name="unit" placeholder="Please Enter Product Unit" required/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="image" onchange="previewImage(event)" required/>
                        </div>
                        <img id="imagePreview" src="#" alt="Image Preview" style="width: 300px; display: none; height:180px; margin: 10px 5px;"/>
                        
                        <form action="{{ route('products.postAdd') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <button type="submit">Thêm sản phẩm</button>
</form>




                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection

@section('script')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = "block";
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
