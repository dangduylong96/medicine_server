<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Product;
use App\UpdateVersion;
class apiProductController extends Controller
{
    public function getAllProduct(Request $request){
        $skip=$request->skip;
        $take=$request->take;
        $product=Product::where('status',1)->orderBy('id','desc')->skip($skip)->take($take)->get();
        $result=[];
        foreach($product as $v){
            $result[]=[
                'id'=>$v->id,
                'name'=>$v->name,
                'category'=>$v->fk_category->name,
                'image'=>$v->img,
                'price'=>number_format($v->price),
                'sales'=>number_format($v->sales)
            ];
        }
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'product'=>$result
        ];
        return json_encode($reponse);
    }
    //Lấy thông tin sản phẩm
    public function getDetailProduct(Request $request){
        $id=$request->id;
        //Kiểm tra id sản phẩm có tồn tại không?
        $product=Product::findOrFail($id);
        //Lấy thông tin sản phẩm
        $result=[
            'id'=>$id,
            'name'=>$product->name,
            'category'=>$product->fk_category->name,
            'image'=>$product->img,
            'price'=>number_format($product->price),
            'sales'=>number_format($product->sales),
            'desc'=>$product->desc
        ];
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'data'=>$result
        ];
        return json_encode($reponse);
    }
    //Tìm kiếm sản phâm
    public function searchProduct(Request $request){
        $keyword=$request->keyword;
        $cate=$request->cate;
        $product=Product::select('*');
        if($keyword!=''){
            $product=$product->where('name','like','%'.$keyword.'%');
        }
        if($cate!=-1){
            $product=$product->where('id_category',$cate);
        }
        $product=$product->get();
        $result=[];
        foreach($product as $v){
            $result[]=[
                'id'=>$v->id,
                'name'=>$v->name,
                'category'=>$v->fk_category->name,
                'image'=>$v->img,
                'price'=>number_format($v->price),
                'sales'=>number_format($v->sales)
            ];
        }
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'data'=>$result
        ];
        return json_encode($reponse);
    }
    //Lấy sản phẩm mới và kiểm tra phiên bản
    public function getNewProduct(){
        $new=Product::where('check_new',1)->get();
        $result=[];
        foreach($new as $v){
            $result[]=[
                'id'=>$v->id,
                'name'=>$v->name,
                'category'=>$v->fk_category->name,
                'image'=>$v->img,
                'price'=>number_format($v->price),
                'sales'=>number_format($v->sales)
            ];
        }
        $total=count($result);
        //Lấy phiên bản xem thử có cập nhập hay không?
        $version=UpdateVersion::find(1);
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'version'=>$version->version,
            'total'=>$total,
            'data'=>$result
        ];
        return json_encode($reponse);
    }
}
