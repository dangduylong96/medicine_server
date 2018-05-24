<?php
namespace App\Helper;

use DB;
use App\adminDetail;
use App\Category;
use App\OrderDetail;
class MyLibrary{
    public static function getAvatar(){
        $detail=adminDetail::first();
        return $detail->img;
    }
    public static function getName(){
        $detail=adminDetail::first();
        return $detail->name;
    }
    public static function getKeyCategory() {
        $category=Category::where('status',1)->get();
        $list_key=[];
        foreach($category as $k=>$v)
        {
            $list_key[]=$v->id;
        }
        $arr=implode(',',$list_key);
        return $arr;
    }
    public static function getListCategory(){
        return Category::where(['status'=>1])->get();
    }
    //Tính tổng tiền của 1 đơn hàng
    public static function getTotalOrder($order_id){
        $order_detail=OrderDetail::where('order_id',$order_id)->get();
        $total=0;
        foreach($order_detail as $k=>$v){
            $total+=(int)($v->price-$v->sales)*$v->qty;
        }
        return $total;
    }
}