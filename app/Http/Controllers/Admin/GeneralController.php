<?php

namespace App\Http\Controllers\Admin;

use App\General;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GeneralRequest;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function edit($type = 1)
    {
        $title = $type == 1 ? 'Privacy' : 'Terms';
        if (!$general = General::where('type',$type)->first())
        {
            $general = General::create(['value'=>'Your Privacy','type'=>1]);
        }
        return view('admin.pages.general.form',compact('title','general'));
    }

    public function update(General $general,GeneralRequest $request)
    {
        $general->update($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }
}
