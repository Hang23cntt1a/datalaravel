@extends('admin.master')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Addres</th>
                                    <th>Role</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users->whereIn('role', [1, 3]) as $user)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username ?? $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? 'N/A' }}</td>
                                <td>{{ $user->address ?? 'N/A' }}</td>
                                <td>{{ $user->role ?? 'N/A' }}</td>
                                <td class="center">
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    <a href="{{ route('users.delete', $user->id) }}"
                                    onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng này không?')">
                                    Delete
                                    </a>
                                </td>

                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
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

    

