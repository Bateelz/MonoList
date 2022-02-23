<?php

namespace App\Http\Controllers\DashbordUser\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as OAuthTwoUser;
use Symfony\Component\HttpFoundation\Response;

class AppleLoginController extends Controller
{
    public function appleLogin(Request $request)
    {
        $provider = 'apple';
        $token = $request->token;

        $socialUser = Socialite::driver($provider)->userFromToken($token);
        $user = $this->getLocalUser($socialUser);
        $data = [
            'grant_type' => 'social',
            'client_id' => 'AKXWGNS6FN',
            'client_secret' => 'MIGTAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBHkwdwIBAQQgzXNNcEhqGH75wNaf
            YQCcdl3v3tQfRCU+TTt9zNBrdkigCgYIKoZIzj0DAQehRANCAAR6XI6fKrRls1Pz
            G9RB0LeE/rNS9nt91BlQg4Pjpn7mPBQ4DdhEnflHyusl/J9ozne7TWJE1kdZujfS73/f4VWu',
            'provider' => 'apple',
            'access_token' => $token
        ];
        $request = Request::create('/oauth/token', 'POST', $data);
        $content = json_decode(app()->handle($request)->getContent());
        if (isset($content->error) && $content->error === 'invalid_request') {
            return response()->json(['error' => true, 'message' => $content->message]);
        }

        return response()->json(
            [
                'error' => false,
                'data' => [
                    'user' => $user,
                    'meta' => [
                        'token' => $content->access_token,
                        'expired_at' => $content->expires_in,
                        'refresh_token' => $content->refresh_token,
                        'type' => 'Bearer'
                    ],
                ]
            ],
            Response::HTTP_OK
        );
    }

    /**
     * @param  OAuthTwoUser  $socialUser
     * @return User|null
     */
    protected function getLocalUser(OAuthTwoUser $socialUser): ?User
    {
        $user = User::where('email', $socialUser->email)->first();
        if (!$user) {
            $user = $this->registerAppleUser($socialUser);
        }
        return $user;
    }


    /**
     * @param  OAuthTwoUser  $socialUser
     * @return User|null
     */
    protected function registerAppleUser(OAuthTwoUser $socialUser): ?User
    {
        $user = User::create(
            [
                'full_name' => request()->fullName ? request()->fullName : 'Apple User',
                'email' => $socialUser->email,
                'password' => Str::random(30),
            ]
        );
        return $user;
    }
}
