<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use JWTAuth;
use Validator;
class apiUserController extends Controller
{
    public function getDetailFromToken(Request $request){
        $payload = JWTAuth::parseToken()->getPayload();
        $data=[
            'name' => $payload->get('name'),
            'dob' => date('d-m-Y',strtotime($payload->get('dob'))),
            'phone' => $payload->get('phone'),
            'name_shop' => $payload->get('name_shop'),
            'address' => $payload->get('address'),
            'tax_code' => $payload->get('tax_code')
        ];
        $reponse=[
            'status'=>200,
            'message'=>'Success',
            'data'=>$data
        ];
        echo json_encode($reponse);
    }
    //Cập nhập thông tin ng dùng
    public function updateDetailFromToken(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required|date_format:"d-m-Y"',
            'name_shop' => 'required',
            'address' => 'required',
            'tax_code' => 'required',
            'phone' => 'required'
        ]);
        if($validator->fails()){
            $result=[
                'status'=>404,
                'message'=>'Error'
            ];
            return json_encode($result);
        }else{
            $payload = JWTAuth::parseToken()->getPayload();
            //Lấy id của ng cần cập nhập
            $id=$payload->get('id');
            $detail_user=UserDetail::where('id_user',$id)->firstOrFail();
            //Cập nhập thông tin người sử dụng mới
            $detail_user->name=$request->name;
            $detail_user->dob=date('Y-m-d',strtotime($request->dob));
            $detail_user->name_shop=$request->name_shop;
            $detail_user->address=$request->address;
            $detail_user->tax_code=$request->tax_code;
            $detail_user->phone=$request->phone;
            $detail_user->save();

            //Tạo lại token mới
            $user=User::find($detail_user->fk_user->id);
            $custom=[
                'id'=>$detail_user->fk_user->id,
                'username'=>$detail_user->fk_user->username,
                'name'=>$detail_user->name,
                'dob'=>$detail_user->dob,
                'phone'=>$detail_user->phone,
                'name_shop'=>$detail_user->name_shop,
                'address'=>$detail_user->address,
                'tax_code'=>$detail_user->tax_code
            ];
            $token = JWTAuth::customClaims($custom)->fromUser($user);

            $reponse=[
                'status'=>200,
                'message'=>'Success',
                'token'=>$token
            ];
            echo json_encode($reponse);
            
        }
    }
}
