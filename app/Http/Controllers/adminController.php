<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\adminDetail;
use App\User;
use App\Product;
use App\Category;
use App\Order;
use File;
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
        if( Auth::attempt(['username' => $username, 'password' => $password,'type'=>1])){
            return redirect()->route('home');
        }
        return view('admin.login.login')->with('message_login','Thông tin đăng nhập chưa chính xác!!');
    }
    //Đăng xuất
    public function adminLogout(){
        Auth::logout();
        return view('admin.login.login');
    }

    //Trang chủ
    public function adminHome(){
        $data['count_user']=User::count();
        $data['count_order']=Order::where('status','!=',3)->count();
        $data['count_product']=Product::where('status','!=',0)->count();
        $data['count_category']=Category::where('status','!=',0)->count();
        return view('admin.dashboard.dashboard',$data);
    }
    //Thông tin admin
    public function adminDetail(){
        $detail=adminDetail::first();
        $data['detail']=$detail; 
        return view('admin.admin_detail.admin_detail',$data);
    }
    public function adminPostDetail(Request $request){
        $request->validate([
            'name' => 'required',
            'dob' => 'required|date_format:"d-m-Y"',
            'phone' => 'required|numeric',
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'dob.required'=>'Bạn chưa nhập ngày sinh',
            'dob.date_format'=>'Ngày sinh không hợp lệ',
            'phone.required'=>'Bạn chưa nhập số điện thoại'
        ]);
        $detail=adminDetail::first();
        $detail->name=$request->name;
        $detail->dob=date('Y-m-d',strtotime($request->dob));
        $detail->phone=$request->phone;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name=str_random(10).$file->getClientOriginalName();
            while(File::exists('public/images/admin/'.$image_name))
            {
                $image_name=str_random(10).$file->getClientOriginalName();
            }
            //upload file
            $file->move('public/images/admin',$image_name);
            //Xóa file cũ
            File::delete('public/images/admin/'.$detail->img);
            $detail->img=$image_name;
        }
        $detail->save();
        return redirect('admin/thong-tin-admin.html')->with('message','Cập nhập thông tin thành công');
    }
}
