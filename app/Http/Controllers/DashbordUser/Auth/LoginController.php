<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ActiveUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                return redirect()->route('list.list');
            }
            return redirect('active');
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
        return redirect('/');
    }

    public function active(){
        $user=Auth::user();
        return view('dasborduser.activeuser.index',compact('user'));
    }

    public function sendactive($user){
      $users=User::where('id',$user)->first();
        $data=[
            'user_id'=>$users->id,
            'email'=>$users->email,
        ];
       Mail::to($users->email)->send(new ActiveUser($data));
       alert()->success('Send Email Success','Send Email Success');
       return back();
    }
}
