<?php

namespace App\Http\Controllers\Site;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\RateRequest;
use App\User;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index(Event $event)
    {
        $rows = $event->speakers()->paginate($this->api_paginate_num);
        return view('site.pages.speaker.index',compact('event','rows'));
    }

    public function show(User $speaker)
    {
        return view('site.pages.speaker.show',compact('event','speaker'));
    }

    public function getVote(User $speaker)
    {
        $was_voted = $speaker->rate()->where('user_id',auth()->id())->first() ? true : false;
        return view('site.pages.event.vote',compact('event','speaker','was_voted'));
    }

    public function PostVote(User $speaker,RateRequest $request)
    {
        $speaker->rate()->create([
            'rate'=>$request->rate,
            'comment'=>$request->comment,
            'user_id'=>auth()->id(),
        ]);
        return redirect()->back()->with('message','voted Successfully');
    }
}
