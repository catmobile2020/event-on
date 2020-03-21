<?php

namespace App\Http\Controllers\Site;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function upcoming()
    {
        $auth_user = auth()->user();
        $company= $auth_user->company;
        $rows = $company->events()->where(function ($q){
            $q->where('start_date','>',today())->orWhere('end_date','>',today());
        })->orderBy('start_date')->get();
        return view('site.pages.event.upcoming',compact('auth_user','company','rows'));
    }

    public function registerToEvent(Event $event)
    {
        $auth_user = auth()->user();
        if ($auth_user->myEvents()->where('event_id',$event->id)->first())
        {
            return ['status'=>'error','title'=>'Information','message'=>'You Already Registered on This Event Before!'];
        }
        $auth_user->myEvents()->attach($event);
        return ['status'=>'success','title'=>'Thank you','message'=>'For registering'];
    }

    public function myCalender()
    {
        $auth_user = auth()->user();
        $rows = $auth_user->myEvents()->orderBy('start_date')->get();
        return view('site.pages.event.calender',compact('auth_user','rows'));
    }

    public function show(Event $event)
    {
        return view('site.pages.event.show',compact('event'));
    }
}
