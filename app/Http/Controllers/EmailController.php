<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    public function getInputEmail()
    {
        return view('emails.input-email');
    }

    public function postInputEmail(Request $req)
    {
        $email = $req->txtEmail;

        $user = User::where('email', $email)->first();

        if ($user) {
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456' // hoặc tạo password mới bằng Str::random(8)
            ];

            Mail::to($email)->send(new SendMail($sentData));

            Session::flash('message', 'Gửi email thành công!');
            return redirect()->route('banhang.login'); // đổi thành route nếu có
        } else {
            return redirect()->route('getInputEmail')->with('message', 'Email không tồn tại!');
        }
    }
}

