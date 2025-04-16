<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function getLogin() {
        return view('banhang.login');
    }

    public function postLogin(Request $req) {
        // Validate dữ liệu đầu vào
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
        ]);

        // Nếu validate thất bại, quay lại trang login với lỗi
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if(Auth::attempt($credentials)){ 
            // Kiểm tra nếu user có level = 1
            if (Auth::user()->role == 1) {
                return redirect('admin/category')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
            } else {
                return redirect('/trangchu')->with(['flag' => 'warning', 'message' => 'Đăng nhập thành công']);
            }
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Sai tài khoản hoặc mật khẩu']);
        }
    }

    public function getLogout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 0,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Thêm user thành công');
    }

    public function edit(User $user) {
        return view('admin.users.user_edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 0,
        ]);

        return redirect()->route('users.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Xóa thành công');
    }

   // USER USER
   public function getUserlist()
   {
       $users = User::all(); // Đúng: lấy toàn bộ user
       return view('admin.users.user_list', compact('users'));
   }
   
   public function getUseradd()
   {
       // Hiển thị form thêm sản phẩm
       return view('admin.users.user_add');
   }

   // Chức năng sửa user của admin
   public function postUserEdit(Request $request, $id)
{
    if (Auth::user()->role != 1) {
        return redirect()->back()->with('error', 'Bạn không có quyền chỉnh sửa');
    }

    $request->validate([
        'role' => 'required|in:0,1',
    ]);

    $user = User::findOrFail($id);
    $user->role = $request->role;
    $user->save();

    return redirect()->route('users.getUserlist')->with('success', 'Cập nhật vai trò thành công');
}

/// Chức năng xóa user
public function getUserDelete($id)
{
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('users.getUserlist')->with('error', 'Không tìm thấy người dùng!');
    }

    $user->delete();
    return redirect()->route('users.getUserlist')->with('success', 'Xoá người dùng thành công!');
}



}
