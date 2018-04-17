<?php
namespace App\Helper;

use DB;
use App\adminDetail;
class MyLibrary{
    public static function getAvatar(){
        $detail=adminDetail::first();
        return $detail->img;
    }
    public static function getName(){
        $detail=adminDetail::first();
        return $detail->name;
    }
}