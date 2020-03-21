<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials))
        {
            return redirect()->intended('/');
        }
        return redirect()->back()->with('message','Error Your Credential is Wrong');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());
        if ($user)
        {
            auth()->login($user);
            return redirect()->intended('/home');
        }
        return redirect()->back()->with('message','Error Happen try Again');
    }

    public function logout()
    {
        auth()->logout();
        return back();
    }
}
