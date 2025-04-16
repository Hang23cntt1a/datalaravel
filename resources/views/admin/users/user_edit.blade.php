@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit Role</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('users.postEdit', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Username</label>
        <input class="form-control" name="username" value="{{ old('username', $user->username) }}" readonly />
    </div>

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" name="email" value="{{ old('email', $user->email) }}" readonly />
    </div>

    <div class="form-group">
        <label>Phone</label>
        <input class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" readonly />
    </div>

    <div class="form-group">
        <label>Address</label>
        <input class="form-control" name="address" value="{{ old('address', $user->address) }}" readonly />
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="0" {{ $user->role == 3 ? 'selected' : '' }}>Khách</option>
            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Quản trị viên</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.user.list') }}" class="btn btn-secondary">Quay lại</a>

</form>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
