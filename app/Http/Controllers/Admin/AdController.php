<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Company;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdRequest;
use Illuminate\Http\Request;

class AdController extends Controller
{
    use UploadImage;

    public function index(Company $company)
    {
        $rows = $company->ads()->latest()->paginate(20);
        return view('admin.pages.ad.index',compact('company','rows'));
    }


    public function create(Company $company)
    {
        $ad = new Ad();
        return view('admin.pages.ad.form',compact('company','ad'));
    }


    public function store(Company $company,AdRequest $request)
    {
        $inputs = $request->all();
        $ad =$company->ads()->create($inputs);
        if ($request->is_image == 1 and $request->photo)
            $this->upload($request->photo,$ad);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function show(Company $company,$id)
    {

    }


    public function edit(Company $company,Ad $ad)
    {
        return view('admin.pages.ad.form',compact('company','ad'));
    }


    public function update(Company $company,AdRequest $request, Ad $ad)
    {
        $inputs = $request->all();
        $ad->update($inputs);
        if ($request->is_image == 1 and $request->photo)
            $this->upload($request->photo,$ad,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function destroy(Company $company,Ad $ad)
    {
        $ad->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
