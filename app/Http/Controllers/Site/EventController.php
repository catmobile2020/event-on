<?php

namespace App\Http\Controllers\Site;

use App\Event;
use App\Filters\EventFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\RateRequest;
use App\Http\Resources\EventResource;
use App\Talk;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function schedule(EventFilter $filter)
    {
        $auth_user = auth()->user();
        $rows = $auth_user->myEvents()->filter($filter)->orderByDesc('start_date')->paginate($this->web_paginate_num);
        $company = auth()->user()->company;
        $speakers =$company->speakers()->active()->get();
        return view('site.pages.event.schedule',compact('auth_user','rows','speakers'));
    }

    public function events()
    {
        $auth_user = auth()->user();
        $company = $auth_user->company;
        $rows = $company->events()->active()->orderByDesc('start_date')->paginate($this->web_paginate_num);
        return view('site.pages.event.index',compact('auth_user','company','rows'));
    }

    public function registerToEvent(Event $event)
    {
        $auth_user = auth()->user();
        if ($auth_user->myEvents()->where('event_id',$event->id)->first())
        {
            return ['status'=>'error','title'=>'Information','message'=>'You Already Registered on This Event Before!'];
        }
        $auth_user->myEvents()->attach($event);
        return ['status'=>'success','title'=>'Thank you','message'=>'For Registration'];
    }

    public function show(Event $event)
    {
        $speakers =collect([]);
        $talks =  $event->talks;
        foreach ($talks as $talk)
        {
            $speakers = $speakers->merge($talk->speakers);
        }
        $speakers = $speakers->unique('id');
        $days =$event->days()->active()->with('talks')->get();
        return view('site.pages.event.show',compact('event','speakers','days'));
    }

    public function live(Event $event)
    {
        return view('site.pages.event.live',compact('event'));
    }

    public function agenda(Event $event,Request $request)
    {
        if ($request->ajax())
        {
            $selected_day =$event->days()->where('id',$request->day_id)->first();
            $rows = $selected_day->talks;
            return view('site.pages.day.talk',compact('rows'))->render();
        }
        $first_day = $event->days()->first();
        $rows = $first_day->talks;
        return view('site.pages.day.index',compact('event','rows'));
    }

    public function getVote(Talk $talk)
    {
        $was_voted = $talk->rates()->where('user_id',auth()->id())->first() ? true : false;
        return view('site.pages.day.talk-vote',compact('talk','was_voted'));
    }

    public function PostVote(Talk $talk,RateRequest $request)
    {
        $talk->rate()->create([
            'rate'=>$request->rate,
            'comment'=>$request->comment,
            'user_id'=>auth()->id(),
        ]);
        return redirect()->back()->with('message','voted Successfully');
    }
}
