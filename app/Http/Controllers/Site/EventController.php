<?php

namespace App\Http\Controllers\Site;

use App\Event;
use App\Events\AnswerEvent;
use App\Events\AskEvent;
use App\Events\VoteEvent;
use App\Filters\EventFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\QuestionRequest;
use App\Http\Requests\Site\RateRequest;
use App\Http\Resources\AskResource;
use App\Http\Resources\PollResource;
use App\Http\Resources\QuestionResource;
use App\Poll;
use App\Question;
use App\Talk;
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

    public function defaultLive(Event $event)
    {
        $auth_user = auth()->user();
        $api_key = env('ZOOM_KEY');
        $api_sercet = env('ZOOM_SECRET');
//        $role = ($auth_user->id == $register->user_id) ? 1 : 0;
        $role =0;
        $signature = $this->generate_signature($api_key,$api_sercet,$event->meeting_id,$role);
        return view('site.pages.event.default',compact('event','auth_user','signature','api_key','role'));
    }

    public function live(Event $event)
    {
        $auth_user = auth()->user();
        $speakers =collect([]);
        $talks =  $event->talks;
        foreach ($talks as $talk)
        {
            $speakers = $speakers->merge($talk->speakers);
        }
        $speakers = $speakers->unique('id');
        $days =$event->days()->active()->with('talks')->get();
        $questions = $auth_user->ownerQuestions;
        $polls = $auth_user->ownerPolls;

        $api_key = env('ZOOM_KEY');
        $api_sercet = env('ZOOM_SECRET');
        $role =0;
        $signature = $this->generate_signature($api_key,$api_sercet,$event->meeting_id,$role);

        return view('site.pages.event.live',compact(
            'event','speakers','days','auth_user','questions','polls','signature','api_key'
        ));
    }

    function generate_signature ( $api_key, $api_sercet, $meeting_number, $role){

        $time = time() * 1000; //time in milliseconds (or close enough)

        $data = base64_encode($api_key . $meeting_number . $time . $role);

        $hash = hash_hmac('sha256', $data, $api_sercet, true);

        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);

        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
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

    public function askSpeakerQuestion(Event $event,QuestionRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->id();
        $ask = $event->asks()->create($inputs);
        broadcast(new AskEvent(AskResource::make($ask)));
        return ['status'=>'success','message'=>'Done Successfully'];
    }

    public function broadcastEvent(Event $event,$type,$id,Request $request)
    {
        if ($type == 1)
        {
            $poll = Poll::find($id);
            if ($request->cast_type == 1)
            {
                $view = view('site.pages.poll.chart',compact('poll'))->render();
            }else
            {
                $view = view('site.pages.poll.vote',compact('poll'))->render();
            }

            broadcast(new VoteEvent($view,$event->id));
            return PollResource::make($poll);
        }
        $question = Question::find($id);
        $view = view('site.pages.question.answer',compact('question'))->render();
        broadcast(new AnswerEvent($view,$event->id));
        return QuestionResource::make($question);
    }
}
