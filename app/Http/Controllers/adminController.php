<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class adminController extends Controller
{
    public function adminLogin(){
        return view('admin.login.login');
    }
    public function adminCheckLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required'=>'Bạn chưa nhập tài khoản',
            'password.required'=>'Bạn chưa nhập mật khẩu'
        ]);
        $username=$request->username;
        $password=$request->password;
        if( Auth::attempt(['username' => $username, 'password' => $password])){
            echo 'Đúng';
            exit;
        }
        return view('admin.login.login')->with('message_login','Thông tin đăng nhập chưa chính xác!!');
    }
}
