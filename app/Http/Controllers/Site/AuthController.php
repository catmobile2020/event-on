<?php

namespace App\Http\Controllers\Site;

use App\Company;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function getLogin()
    {
     return view('site.pages.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->email;
        $row = User::where('email',$email)->first();
        if ($row)
        {
            if ($row->active ==0)
            {
                return redirect()->back()->with('message','Your Account Is DisActive Back To Admin');
            }
            if (Hash::check($request->password,$row->password))
            {
                auth('web')->login($row,$request->remember);
                return redirect()->intended('/home');
            }
        }
        return redirect()->back()->with('message','Error Your Credential is Wrong');
    }

    public function getRegister($token)
    {
        if (!$company = Company::where('token',$token)->first())
        {
            return abort(404);
        }
        $countries = Country::all();
        return view('site.pages.auth.register',compact('company','countries'));
    }

    public function postRegister($token,RegisterRequest $request)
    {
        if (!$company = Company::where('token',$token)->first())
        {
            return abort(404);
        }
        $inputs = $request->all();
        $inputs['type'] = 2;

        $user =$company->users()->create($inputs);
        auth('web')->login($user,$request->remember_me);
        return redirect()->intended('/home');
    }

    public function logout()
    {
        auth('web')->logout();
        request()->session()->invalidate();
        return redirect()->route('site.login');
    }
}
