<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return $user;
            if ($driver  === 'google') {
                $finduser = User::where('email', $user->email)->first();
            }

            if ($driver  === 'facebook') {
                $finduser = User::where('email', $user->email)->first();
            }
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('root');
            } else {
                $newUser = User::create([
                    'first_name' => $user->name,
                    'last_name'=>$user->name,
                    'user_name'=>$user->name,
                    'email' => $user->email,
                    'google_id' => $driver == "google" ? $user->id : null,
                    'facebook_id' => $driver == "facebook" ? $user->id : null,
                    'password' => Hash::make('123456789')
                ]);
                Auth::login($newUser);
                return redirect()->route('root');
            }
        } catch (\Throwable $th) {
            throw $th;
         }
    }

}
