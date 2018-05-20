<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class apiCategoryController extends Controller
{
    public function getCategory(){
        $result=Category::select('id','name')->where('status',1)->get();
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'data'=>$result
        ];
        return json_encode($reponse);
    }
}
