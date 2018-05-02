<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
class appMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->has('token')){
            $result=[
                'status'=>404,
                'message'=>'Error'
            ];
            echo json_encode($result);
            exit;
        }
        $user = JWTAuth::parseToken()->authenticate();
        if(!$user){
            $result=[
                'status'=>404,
                'message'=>'Error'
            ];
            echo json_encode($result);
            exit;
        }
        return $next($request);
    }
}
