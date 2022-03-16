<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ActiveUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dasborduser.auth.register');
    }

    public function Registration(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user=new User();
        $user->fullname=$request->fullname;
        // $user->last_name=$request->last_name;
        // $user->user_name=$request->first_name.' '.$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->status=0;
        $user->save();
        $data=[
            'user_id'=>$user->id,
            'email'=>$user->email,
        ];
        Mail::to($request->email)->send(new ActiveUser($data));
        Auth::login($user,true);
        alert()->success('Register Success','Register Success');
        return redirect('user/');
    }

}
