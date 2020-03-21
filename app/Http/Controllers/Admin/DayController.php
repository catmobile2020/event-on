<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use App\Event;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DayRequest;

class DayController extends Controller
{
    use UploadImage;
    public function index(Event $event)
    {
        $rows = $event->days()->latest()->paginate($this->web_paginate_num);
        return view('admin.pages.day.index',compact('event','rows'));
    }

    public function create(Event $event)
    {
        $day = new Day();
        return view('admin.pages.day.form',compact('event','day'));
    }

    public function store(Event $event,DayRequest $request)
    {
        $inputs = $request->except('photo');
        $day = $event->days()->create($inputs);
        if ($request->photo)
            $this->upload($request->photo,$day);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function show(Event $event,Day $day)
    {

    }

    public function edit(Event $event,Day $day)
    {
        return view('admin.pages.day.form',compact('event','day'));
    }

    public function update(Event $event,DayRequest $request,Day $day)
    {
        $inputs = $request->except('photo');
        $day->update($inputs);
        if ($request->photo)
            $this->upload($request->photo,$day,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Event $event,Day $day)
    {
        $day->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
