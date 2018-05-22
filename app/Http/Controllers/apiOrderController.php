<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use JWTAuth;
class apiOrderController extends Controller
{
    public function postOrder(Request $request){
        $payload = JWTAuth::parseToken()->getPayload();
        $user_id=$payload->get('id');
        $cart=$request->cart;
        //Lưu cart
        $arr=[];
        foreach($cart as $k=>$v){
            //Lấy id của sản phầm
            $id_product=$v['id'];
            $product=Product::find($id_product);
            $row=new Order;
            $row->user_id=$user_id;
            $row->id_product=$id_product;
            $row->name=$product->name;
            $row->qty=$v['qty'];
            $row->sales=$product->sales;
            $row->price=$product->price;
            $row->img=$product->img;
            $row->status=0;
            $row->save();
        }
        $reponse=[
            'status'=>200,
            'message'=>'Success'
        ];
        return json_encode($reponse);
    }
}
