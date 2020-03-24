<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->get();
        return view('site.pages.home',compact('sliders'));
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
        $rows = $company->faqs()->active()->get();
        return view('site.pages.faqs',compact('company','rows'));
    }
}
