<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Mail\SuccessForgetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function checkcode(Request $request)
    {
        $this->validate($request, ['code' => 'required']);
        $email=DB::table('password_resets')->where('code',$request->code)->first();
        if ($email) {
            $time_now = Carbon::now()->addMinute(15)->format('H:i:s Y:m:d');
            $time_created = Carbon::parse($email->created_at)->format('H:i:s Y:m:d');
            if ($time_now > $time_created) {
                return $this->errorResponse('Inviled time', 422);
            }
            return $this->successResponse(['email'=>$email->email], "success", 200);
        } else {
            return $this->errorResponse("app.invalid_code", 422);
        }
    }

    public function verifyEmailLogin(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $user = User::Where('email', $request->email)->first();
        if ($user) {
             $token=rand(1111,9999);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'code' => $token,
                'created_at' => Carbon::now()
            ]);
                $data = [
                    'email' => $request->email,
                    'otp' => $token,
                ];
            Mail::to($request->email)->send(new ForgetPassword($data));
            return $this->successResponse(null, 'Success Send email');
        }
        return $this->successResponse(null, 'NotFound');
    }

    public function UpdatePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $email=DB::table('password_resets')->where('code',$request->code)->delete();
            $user->password = Hash::make($request->password);
            $user->save();
            return $this->successResponse(null, 'Success Update Password');
        }
        return $this->errorResponse('Not Found Email');
    }
}
