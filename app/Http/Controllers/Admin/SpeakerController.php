<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpeakerRequest;
use App\User;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    use UploadImage;

    public function index(Company $company)
    {
        $rows = $company->speakers()->latest()->paginate(20);
        return view('admin.pages.speaker.index',compact('company','rows'));
    }


    public function create(Company $company)
    {
        $speaker = new User();
        return view('admin.pages.speaker.form',compact('company','speaker'));
    }


    public function store(Company $company,SpeakerRequest $request)
    {
        $inputs = $request->all();
        $speaker =$company->speakers()->create($inputs);
        if ($request->photo)
            $this->upload($request->photo,$speaker);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function show(Company $company,$id)
    {

    }


    public function edit(Company $company,User $speaker)
    {
        return view('admin.pages.speaker.form',compact('company','speaker'));
    }


    public function update(Company $company,SpeakerRequest $request, User $speaker)
    {
        $inputs = $request->all();
        if (!$request->password)
        {
            unset($inputs['password']);
        }
        $speaker->update($inputs);
        if ($request->photo)
            $this->upload($request->photo,$speaker,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function destroy(Company $company,User $speaker)
    {
        $speaker->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
