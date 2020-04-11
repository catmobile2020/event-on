<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Mail\ResetPasswordMail;
use App\User;
use Illuminate\Support\Facades\Mail;

class ChangePasswordController extends Controller
{

    public function getResetPassword()
    {
        return view('site.pages.auth.reset-password');
    }

    public function postResetPassword(ResetPasswordRequest $request)
    {
        try
        {
            if (!$user = User::where('email',$request->email)->first())
            {
                return redirect()->back()->with('message','No Account With This E-mail Try Again');
            }
            $rand_token = md5(rand(000000,999999));
            $user->update(['reset_token'=>$rand_token]);
            Mail::to($request->email)->send(new ResetPasswordMail($rand_token));
            return redirect()->back()->with('message','Send Successfully. Check Your E-mail!');
        }catch (\Exception $exception)
        {
            return redirect()->back()->with('message',$exception->getMessage());
        }
        return redirect()->back()->with('message','Error Happen Try Again!');
    }

    public function changePassword($token)
    {
        if ($user = User::where('reset_token',$token)->first())
        {
            return view('site.pages.auth.update-password');
        }
        return abort(404);
    }

    public function updatePassword($token,UpdatePasswordRequest $request)
    {
        if ($user = User::where('reset_token',$token)->first())
        {
            $user->update(['password'=>$request->password,'reset_token'=>null]);
            return redirect()->route('site.login');
        }
        return abort(404);
    }
}
