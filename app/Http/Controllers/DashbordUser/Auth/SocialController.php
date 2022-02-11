<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectSocialite($driver)
    {
        return Socialite::driver($driver)->redirect();
    }


    public function handleCallback($driver)
    {
        try {

            $user = Socialite::driver($driver)->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect()->route('root');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456789')
                ]);
                Auth::login($newUser);
                return redirect()->route('root');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
