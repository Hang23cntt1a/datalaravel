@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container">
        <h2>Thêm Người Dùng Mới</h2>
        <form action="{{ route('users.add') }}" method="POST">
            @csrf

            <!-- Hiển thị lỗi nếu có -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="full_name">Họ và Tên:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required value="{{ old('full_name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Xác nhận Mật khẩu:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" required value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" required value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="level">Cấp độ:</label>
                <input type="number" class="form-control" id="level" name="level" required value="{{ old('level') }}">
            </div>
            <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
        </form>
    </div>
    </div>
@endsection
