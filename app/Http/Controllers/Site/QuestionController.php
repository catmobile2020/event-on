<?php

namespace App\Http\Controllers\Site;

use App\Events\AnswerEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\AnswerRequest;
use App\Http\Requests\Site\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Question;
use App\User;

class QuestionController extends Controller
{
    public function index(User $speaker)
    {
        $rows = $speaker->ownerQuestions()->paginate($this->api_paginate_num);
        return view('site.pages.question.index',compact('rows'));
    }

    public function store(User $speaker,QuestionRequest $request)
    {
        $question =$speaker->ownerQuestions()->create($request->all());
        if ($question)
        {
            if ($request->ajax())
            {
                $view = view('site.pages.question.answer',compact('question'))->render();
                broadcast(new AnswerEvent($view,$request->event_id));
                return ['status'=>'success','message'=>'Done Successfully'];
            }
            return redirect()->back()->with('message','Done Successfully');
        }
        if ($request->ajax())
        {
            return ['message'=>'error happen try again !'];
        }
        return redirect()->back()->with('message','error happen try again !');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()->with('message','Done Successfully');
    }

    public function addAnswer(Question $question,AnswerRequest $request)
    {
        $auth_user = auth()->user();
        if ($question->answers()->where('user_id',$auth_user->id)->first())
        {
            return ['status'=>'error','message'=>'You Add Answer To This Question Before.'];
        }
        $inputs = $request->all();
        $inputs['user_id'] = $auth_user->id;
        $answer = $question->answers()->create($inputs);
        if ($answer)
        {
            return ['status'=>'success','message'=>'Done Successfully'];
        }
        return ['status'=>'error','message'=>'error happen try again !'];
    }
}
