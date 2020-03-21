<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TalkRequest;
use App\Talk;
use App\User;

class TalkController extends Controller
{
    public function index(Day $day)
    {
        $rows = $day->talks()->with('rates')->orderBy('time_from')->paginate($this->web_paginate_num);
        return view('admin.pages.talk.index',compact('day','rows'));
    }

    public function create(Day $day)
    {
        $talk = new Talk();
        $speakers = User::speakers()->get();
        return view('admin.pages.talk.form',compact('day','talk','speakers'));
    }

    public function store(Day $day,TalkRequest $request)
    {
        $inputs = $request->all();
        $talk = $day->talks()->create($inputs);
        $talk->speakers()->sync($request->speaker_id);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function show(Day $day,Talk $talk)
    {

    }

    public function edit(Day $day,Talk $talk)
    {
        $speakers = User::speakers()->get();
        return view('admin.pages.talk.form',compact('day','talk','speakers'));
    }

    public function update(Day $day,TalkRequest $request,Talk $talk)
    {
        $inputs = $request->all();
        $talk->update($inputs);
        $talk->speakers()->sync($request->speaker_id);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Day $day,Talk $talk)
    {
        $talk->delete();
        return redirect()->back()->with('message','Done Successfully');
    }

    public function rates(Day $day,Talk $talk)
    {
        $rows = $talk->rates()->latest()->paginate(20);
        return view('admin.pages.talk.rates',compact('day','talk','rows'));
    }
}
