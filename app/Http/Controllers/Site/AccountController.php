<?php

namespace App\Http\Controllers\Site;

use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    use UploadImage;
    public function me()
    {
        $auth_user = auth()->user();
        return view('site.pages.account.index',compact('auth_user'));
    }

    public function editAccount()
    {
        $auth_user = auth()->user();
        return view('site.pages.account.edit',compact('auth_user'));
    }

    public function updateAccount(UpdateAccountRequest $request)
    {
        $auth_user = auth()->user();
        $auth_user->update($request->all());
        if ($request->photo)
            $this->upload($request->photo,$auth_user,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function editAccountPassword()
    {
        return view('site.pages.account.update-password');
    }

    public function updateAccountPassword(UpdateAccountRequest $request)
    {
        $user = auth()->user();
        if (Hash::check($request->current_password,$user->password))
        {
            if ($request->current_password === $request->password)
            {
                return redirect()->back()->with('message','Current And New Password is Same');
            }
            $user->update(['password'=>$request->password]);
//            auth()->logout($user);
            return redirect()->back()->with('message','Done Successfully');
        }
        return redirect()->back()->with('message','Current Password Wrong');
    }
}
