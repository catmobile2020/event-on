<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Event;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;

class EventController extends Controller
{
    use UploadImage;
    public function index(Company $company)
    {
        $rows = $company->events()->latest()->paginate($this->web_paginate_num);
        return view('admin.pages.event.index',compact('company','rows'));
    }

    public function create(Company $company)
    {
        $event = new Event();
        return view('admin.pages.event.form',compact('company','event'));
    }

    public function store(Company $company,EventRequest $request)
    {
        $inputs = $request->except('photo');
        $event = $company->events()->create($inputs);
        if ($request->photo)
            $this->upload($request->photo,$event);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function show(Company $company,Event $event)
    {

    }

    public function edit(Company $company,Event $event)
    {
        return view('admin.pages.event.form',compact('company','event'));
    }

    public function update(Company $company,EventRequest $request,Event $event)
    {
        $inputs = $request->except('photo');
        $event->update($inputs);
        if ($request->photo)
            $this->upload($request->photo,$event,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Company $company,Event $event)
    {
        $event->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
