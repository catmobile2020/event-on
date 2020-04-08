<?php

namespace App\Http\Controllers\Site;

use App\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function privacy()
    {
        $title = 'privacy';
        $row = General::where('type',1)->first();
        return view('site.pages.general',compact('row','title'));
    }

    public function terms()
    {
        $title = 'terms & conditions';
        $row = General::where('type',2)->first();
        return view('site.pages.general',compact('row','title'));
    }

    public function about()
    {
        $row = General::where('type',3)->first();
        return view('site.pages.about',compact('row'));
    }
}
