<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Product;
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
        // $payload = JWTAuth::parseToken()->getPayload();
        // echo $payload->get('name_shop');
        // // print_r($payload);
        // exit;
    }
}
