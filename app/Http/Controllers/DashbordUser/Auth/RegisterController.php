<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dasborduser.auth.register');
    }

    public function Registration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user=new User();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->user_name=$request->first_name.' '.$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::login($user,true);
        return redirect('user/');
    }

}
