<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ActiveUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $cred = $request->only('email', 'password');
        if (Auth::attempt($cred)) {
            $user = User::where('email', $request->email)->first();
            if ($user->status == 1) {
                $token = JWTAuth::fromuser($user);
                return $this->successResponse([
                    "user" => $user,
                    "token" => $token
                ]);
            }
            return $this->errorResponse('Not Active User');
        }
        return $this->errorResponse("Wrong Email Or Password");
    }

    public function register(Request $request){
        $this->validate($request, [
            'fullname'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user=new User();
        $user->fullname=$request->fullname;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        $token = JWTAuth::fromuser($user);
        $data=[
            'user_id'=>$user->id,
            'email'=>$user->email,
        ];
        Mail::to($request->email)->send(new ActiveUser($data));
        return $this->successResponse([
            "user" => $user,
            "token" => $token
        ]);
    }
}
