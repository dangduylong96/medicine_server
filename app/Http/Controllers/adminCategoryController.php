<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class adminCategoryController extends Controller
{
    public function getCategory(){
        $data['category']=Category::all();
        return view('admin.category.category',$data);
    }
    public function addCategory(){
        return view('admin.category.add_category');
    }
    public function addPostCategory(Request $request){
        $request->validate([
            'name' => 'required'
        ],[
            'name.required'=>'Tên không được bỏ trông',
        ]);
        $category=new Category;
        $category->name=$request->name;
        $category->status=1;
        $category->save();
        return redirect('admin/danh-sach-loai.html')->with('message',['status'=>'success','content'=>'Thêm loại thành công!!']);
    }
    public function editCategory($id){
        //Kiểm tra id có tồn tại không?
        $category=Category::find($id);
        if(!isset($category)){
            return redirect('admin/danh-sach-loai.html')->with('message',['status'=>'danger','content'=>'Loại không tồn tại !!']);
        }
        $data['category']=$category;
        return view('admin.category.edit_category',$data);
    }
    public function editPostCategory(Request $request,$id){
        //Kiểm tra id có tồn tại không?
        $category=Category::find($id);
        if(!isset($category)){
            return redirect('admin/danh-sach-loai.html')->with('message',['status'=>'danger','content'=>'Loại không tồn tại !!']);
        }
        $request->validate([
            'name' => 'required'
        ],[
            'name.required'=>'Bạn chưa nhập tài khoản'
        ]);
        $category->name=$request->name;
        $category->save();
        return redirect('admin/danh-sach-loai.html')->with('message',['status'=>'success','content'=>'Sửa loại thành công!!']);
    }
    public function removeCategory($id){
        //Kiểm tra id có tồn tại không?
        $category=Category::find($id);
        if(!isset($category)){
            return redirect('admin/danh-sach-loai.html')->with('message',['status'=>'danger','content'=>'Loại không tồn tại !!']);
        }
        $category->delete();
        return redirect('admin/danh-sach-loai.html')->with('message',['status'=>'success','content'=>'Xóa loại thành công!!']);
    }
}
