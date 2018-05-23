<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\OrderDetail;
use JWTAuth;
class apiOrderController extends Controller
{
    //Đặt hàng
    public function postOrder(Request $request){
        $payload = JWTAuth::parseToken()->getPayload();
        $user_id=$payload->get('id');
        $cart=$request->cart;
        //Lưu vào bảng order
        $row=new Order;
        $row->user_id=$user_id;
        $row->status=0;
        $row->save();
        //Lấy id vừa thêm
        $id_order=$row->id;
        //Lưu vào bảng order_detail
        foreach($cart as $k=>$v){
            //Lấy id của sản phầm
            $id_product=$v['id'];
            $product=Product::find($id_product);
            $row=new OrderDetail;
            $row->order_id=$id_order;
            $row->id_product=$id_product;
            $row->name=$product->name;
            $row->qty=$v['qty'];
            $row->sales=$product->sales;
            $row->price=$product->price;
            $row->img=$product->img;
            $row->save();
        }
        $reponse=[
            'status'=>200,
            'message'=>'Success'
        ];
        return json_encode($reponse);
    }
    //Lấy thông tin đơn hàng
    public function getOrderHistory(Request $request){
        $payload = JWTAuth::parseToken()->getPayload();
        $user_id=$payload->get('id');
        //Lấy kết quả
        $result=[];
        $order=Order::where('user_id',$user_id)->orderBy('id','desc')->get();
        foreach($order as $k=>$v){
            $order_id=$v->id;
            $order_detail=OrderDetail::where('order_id',$order_id)->get();
            $result[]=[
                'id'=>$order_id,
                'user_id'=>$v->user_id,
                'created_at'=>date('d/m/Y',strtotime($v->created_at)),
                'status'=>$v->status,
                'order_detail'=> $order_detail
            ];
        }
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'data'=> $result
        ];
        return json_encode($reponse);
    }
}
