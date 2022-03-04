<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('dasborduser.auth.login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status == 1){
                return redirect('user/');
            }
            alert()->warning('The Account Is Not Active','Not Active Account');
            return redirect("/");
        }
        alert()->error('Wrong Email Or Password','Invalid Data');
        return redirect("/");
    }

    public function active_user($id){
        $user=User::where('id',$id)->update(['status'=>1]);
        alert()->success('The Account Is Active','Active Account');
        return redirect("/");
     }

    public function logout(){
        Auth::logout();
        // alert()->success('Logout Success','Success Logout');
        return redirect('/');
    }
}
