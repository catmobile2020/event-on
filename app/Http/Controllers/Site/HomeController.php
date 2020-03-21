<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.pages.home');
    }

    public function about()
    {
        $auth_user = auth()->user();
        $company= $auth_user->company;
        return view('site.pages.about',compact('company'));
    }

    public function faqs()
    {
        $auth_user = auth()->user();
        $company= $auth_user->company;
        $rows = $company->faqs;
        return view('site.pages.faqs',compact('company','rows'));
    }
}
