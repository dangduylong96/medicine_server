<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use MyLibrary;
use File;
class adminProductController extends Controller
{
    public function getProduct(){
        $data['product']=Product::where(['status'=>1])->orderBy('id','desc')->get();
        return view('admin.product.product',$data);
    }
    //Thêm sản phẩm
    public function addProduct(){
        $data['category']=MyLibrary::getListCategory();
        return view('admin.product.add_product',$data);
    }
    public function addPostProduct(ProductRequest $request){
        $price=str_replace('.','',$request->price);
        $sale=str_replace('.','',$request->sale);;
        if(!is_numeric($price) || !is_numeric($sale)){
            echo '<script>alert("Phát hiện dữ liệu k an toàn!!!)</script>';
            echo '<script>history.go(-1);</script>';
            exit;
        }
        $product=new Product;
        $product->name=$request->name;
        $product->id_category=$request->category;
        $product->price=$price;
        $product->sales=$sale;
        $product->desc=$request->desc;
        $product->status=$request->status;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name=str_random(10).$file->getClientOriginalName();
            while(File::exists('public/images/product/'.$image_name)){
                $image_name=str_random(10).$file->getClientOriginalName();
            }
            //upload files
            $file->move('public/images/product',$image_name);
            $product->img=$image_name;
        }
        $product->save();
        return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'success','content'=>'Thêm sản phẩm thành công!!']);
    }
    public function editProduct($id){
        //Kiểm tra có tồn tại sản phẩm không?
        $product=Product::find($id);
        if(!isset($product)){
            return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'error','content'=>'Sản phẩm không tồn tại!!']);
        }
        $data['category']=MyLibrary::getListCategory();
        $data['product']=$product;
        return view('admin.product.edit_product',$data);
    }
    public function editPostProduct($id,ProductRequest $request){
        $price=str_replace('.','',$request->price);
        $sale=str_replace('.','',$request->sale);;
        if(!is_numeric($price) || !is_numeric($sale)){
            echo '<script>alert("Phát hiện dữ liệu k an toàn!!!)</script>';
            echo '<script>history.go(-1);</script>';
            exit;
        }
        $product=Product::find($id);
        $product->name=$request->name;
        $product->id_category=$request->category;
        $product->price=$price;
        $product->sales=$sale;
        $product->desc=$request->desc;
        $product->status=$request->status;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name=str_random(10).$file->getClientOriginalName();
            while(File::exists('public/images/product/'.$image_name)) {
                $image_name=str_random(10).$file->getClientOriginalName();
            }
            //Xóa hình cũ
            File::delete('public/images/product/'.$product->img);
            //Upload hình mới
            $file->move('public/images/product',$image_name);
            $product->img=$image_name;
        }
        $product->save();
        return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'success','content'=>'Cập nhập sản phẩm thành công!!']);
    }
    public function deleteProduct($id){
        //Kiểm tra có tồn tại sản phẩm không?
        $product=Product::find($id);
        if(!isset($product)){
            return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'error','content'=>'Sản phẩm không tồn tại!!']);
        }
        //Xóa hình cũ
        // File::delete('public/images/product/'.$product->img);
        $product->status=0;
        $product->save();
        return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'success','content'=>'Xóa sản phẩm thành công!!']);
    }
    //Thêm sản phảm mới
    public function checkNewProduct($id){
        //Kiểm tra có tồn tại sản phẩm không?
        $product=Product::find($id);
        if(!isset($product)){
            return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'error','content'=>'Sản phẩm không tồn tại!!']);
        }
        if($product->check_new==0){
            $product->check_new=1;
            $product->save();
            return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'success','content'=>'Sản phẩm đã trở thành sản phẩm mới!!']);
        }else{
            $product->check_new=0;
            $product->save();
            return redirect('admin/danh-sach-san-pham.html')->with('message',['status'=>'success','content'=>'Sản phẩm đã trở thành sản phẩm bình thường!!']);
        }
        
    }
}
