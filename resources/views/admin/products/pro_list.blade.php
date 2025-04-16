@extends('admin.master')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Unit price</th>
                                <th>Promotion price</th>
                                <th>Unit</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $stt => $product)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('source/image/product/'.$product->image) }}" alt="image" width="100px" height="60px">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->unit_price }}</td>
                                    <td>{{ $product->promotion_price }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td class="center">
                                        <form action="{{ route('admin.pro.delete', ['id' => $product->id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá danh mục này không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-o fa-fw"></i> Delete
                                            </button>
                                        </form>
                                    </td>

                                    <td class="center">
                                        <i class="fa fa-pencil fa-fw"></i>
                                        <a href="{{  route('admin.pro.edit', $product->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

    

