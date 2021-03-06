<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use JWTAuth;
use App\User;
use App\UserDetail;

class ApiController extends Controller
{
    public function getToken(){
        $arr=[
            '_token'=>csrf_token()
        ];
        echo json_encode($arr);
    }

    public function checkTokenApp(Request $request){
        $token=$request->token;
    }

    public function Login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            $result=[
                'status'=>404,
                'message'=>'Error'
            ];
            return json_encode($result);
        }else{
            $username=$request->username;
            $password=$request->password;
            if(Auth::attempt(['username' => $username, 'password' => $password])){
                //Đăng nhập thành công
                $user=Auth::user();
                $user=User::find($user->id);
                $user_detail=UserDetail::where('id_user',$user->id)->first();
                $custom=[
                    'id'=>$user->id,
                    'username'=>$user->username,
                    'name'=>$user_detail->name,
                    'dob'=>$user_detail->dob,
                    'phone'=>$user_detail->phone,
                    'name_shop'=>$user_detail->name_shop,
                    'address'=>$user_detail->address,
                    'tax_code'=>$user_detail->tax_code
                ];
                $token = JWTAuth::customClaims($custom)->fromUser($user);
                $result=[
                    'status'=>200,
                    'message'=>'Success',
                    '_token'=>$token
                ];
                return json_encode($result);
            }else{
                $result=[
                    'status'=>404,
                    'message'=>'Error'
                ];
                return json_encode($result);
            }  
        }
    }

    public function Register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'name' => 'required',
            'date' => 'required|date_format:"d-m-Y"',
            'name_medicine' => 'required',
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
            //Thêm tài khoản
            $row=new User;
            $row->username=$request->username;
            $row->type=2;
            $row->password=bcrypt($request->password);
            $row->save();
            /* Thêm ở bảng user_detail
            ** Lấy id vừa insert
            */
            $last_id=$row->id;
            $row_detail=new UserDetail;
            $row_detail->id_user=$last_id;
            $row_detail->name=$request->name;
            $row_detail->dob=date('Y-m-d',strtotime($request->date));
            $row_detail->phone=$request->phone;
            $row_detail->name_shop=$request->name_medicine;
            $row_detail->address=$request->address;
            $row_detail->age=1;
            $row_detail->tax_code=$request->tax_code;;
            $row_detail->save();

            $result=[
                'status'=>200,
                'message'=>'Success'
            ];
            return json_encode($result);
        }
    }
}
