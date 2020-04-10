<?php

namespace App\Http\Controllers\Site;

use App\Events\VoteEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PollRequest;
use App\Http\Requests\Site\UserPollRequest;
use App\Http\Resources\PollResource;
use App\Poll;
use App\User;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index(User $speaker)
    {
        $rows = $speaker->ownerPolls()->with('options')->paginate($this->api_paginate_num);
        return view('site.pages.poll.index',compact('rows'));
    }

    public function store(User $speaker,PollRequest $request)
    {
        $poll =$speaker->ownerPolls()->create([
            'question'=>$request->question
        ]);
        if ($poll)
        {
            foreach (array_filter($request->options) as $option)
            {
                $poll->options()->create(['option'=>$option]);
            }
            if ($request->ajax())
            {
                $view = view('site.pages.poll.vote',compact('poll'))->render();
                broadcast(new VoteEvent($view,$request->event_id));
                return PollResource::make($poll);
            }
            return redirect()->back()->with('message','Done Successfully');
        }
        if ($request->ajax())
        {
            return ['message'=>'error happen try again !'];
        }
        return redirect()->back()->with('message','error happen try again !');
    }

    public function destroy(Poll $poll)
    {
        $poll->delete();
        return redirect()->back()->with('message','Done Successfully');
    }

    public function addVote(Poll $poll,UserPollRequest $request)
    {
        $auth_user = auth()->user();
        if ($poll->userPolls()->where('user_id',$auth_user->id)->first())
        {
            return ['status'=>'error','message'=>'You Already Submit this Vot Before.'];
        }
        $vot = $poll->userPolls()->create([
            'poll_option_id'=>$request->poll_option_id,
            'user_id'=>$auth_user->id,
        ]);
        if ($vot)
        {
            return ['status'=>'success','message'=>'Done Successfully'];
        }
        return ['status'=>'error','message'=>'error happen try again !'];
    }
}
