<?php

namespace App\Http\Controllers\Admin;

use App\General;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GeneralRequest;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    use UploadImage;

    public function edit($type = 1)
    {
        if ($type == 1)
        {
            $title ='Privacy';
        }elseif ($type == 2)
        {
            $title ='Terms';
        }else
        {
            $title ='About Us';
        }
        if (!$general = General::where('type',$type)->first())
        {
            $general = General::create(['value'=>$title,'type'=>$type]);
        }
        return view('admin.pages.general.form',compact('title','general'));
    }

    public function update(General $general,GeneralRequest $request)
    {
        $general->update($request->all());
        if ($request->photo)
            $this->upload($request->photo,$general,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }
}
