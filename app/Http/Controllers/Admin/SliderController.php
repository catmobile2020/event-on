<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use UploadImage;

    public function index(Company $company)
    {
        $rows = $company->sliders()->latest()->paginate(20);
        return view('admin.pages.slider.index',compact('company','rows'));
    }


    public function create(Company $company)
    {
        $slider = new Slider();
        return view('admin.pages.slider.form',compact('company','slider'));
    }


    public function store(Company $company,SliderRequest $request)
    {
        $inputs = $request->all();
        $slider =$company->sliders()->create($inputs);
        if ($request->is_image == 1 and $request->photo)
            $this->upload($request->photo,$slider);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function show(Company $company,$id)
    {

    }


    public function edit(Company $company,Slider $slider)
    {
        return view('admin.pages.slider.form',compact('company','slider'));
    }


    public function update(Company $company,SliderRequest $request, Slider $slider)
    {
        $inputs = $request->all();
        if (!$request->password)
        {
            unset($inputs['password']);
        }
        $slider->update($inputs);
        if ($request->is_image == 1 and $request->photo)
            $this->upload($request->photo,$slider,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function destroy(Company $company,Slider $slider)
    {
        $slider->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
