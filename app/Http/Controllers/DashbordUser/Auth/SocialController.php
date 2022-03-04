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
        $userSocial = Socialite::driver($driver)->stateless()->user();
        $users      = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);
            alert()->success('You are login from' . $driver,'Success');
            return redirect()->route('root')->with('success', 'You are login from' . $driver);
        } else {
            $newUser = User::create([
                'fullname' => $userSocial->getName(),
                // 'last_name' => $userSocial->getName(),
                // 'user_name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'google_id' => $driver == "google" ? $userSocial->getId() : null,
                'facebook_id' => $driver == "facebook" ? $userSocial->getId() : null,
                'password' => Hash::make('123456789')
            ]);
            Auth::login($newUser);
            return redirect()->route('root');
        }
    }
}
