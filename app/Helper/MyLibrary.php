<?php
namespace App\Helper;

use DB;
use App\adminDetail;
use App\Category;
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
}