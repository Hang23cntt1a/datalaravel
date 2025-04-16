@extends('layouts.master')

@section('content')
    <div class="container">
        <div id="content">
            <form action="{{ route('postlogin') }}" method="post" class="beta-form-checkout">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4 style="font-family:Time new roman;">Đăng nhập</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-block">
                            <label for="password">Password*</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <a href="{{route('getInputEmail')}}">Quên mật khẩu ?</a>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
