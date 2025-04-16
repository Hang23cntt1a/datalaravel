<form action="{{ route('postInputEmail') }}" method="POST">
    @csrf
    <h2>Quên mật khẩu</h2>
    <input type="email" name="txtEmail" placeholder="Nhập email của bạn" required>
    <button type="submit">Gửi mật khẩu mới</button>
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</form>
