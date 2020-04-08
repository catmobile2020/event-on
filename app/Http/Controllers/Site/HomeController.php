<?php

namespace App\Http\Controllers\Site;

use App\General;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $company = auth()->user()->company;
        $sliders = $company->sliders()->active()->get();
        $video = $company->intro_video;
        $ads = $company->ads()->active()->get();
        $event =$company->events()->active()->where(function ($q){
            $q->where('start_date','>=',today())->orWhere('end_date','>',today());
        })->orderBy('start_date')->first();
        return view('site.pages.home',compact('company','sliders','video','ads','event'));
    }

    public function faqs()
    {
        $auth_user = auth()->user();
        $company= $auth_user->company;
        $rows = $company->faqs()->active()->get();
        return view('site.pages.faqs',compact('company','rows'));
    }
}
