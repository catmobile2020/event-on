<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function me()
    {
        $auth_user = auth()->user();
        return view('site.pages.account.index',compact('auth_user'));
    }
}
