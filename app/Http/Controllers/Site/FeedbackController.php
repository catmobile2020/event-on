<?php

namespace App\Http\Controllers\Site;

use App\Day;
use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function addFeedback(Day $day, Request $request)
    {
            $this->validate($request, [
               'q1'=>'required',
               'q2'=>'required',
               'q3'=>'required',
               'q4'=>'required',
            ]);
            $count = $day->feedback()->where('user_id', Auth::id())->count();
            if($count > 0)
            {
                return response()->json(['msg'=>'you have submitted this before', "state"=>0]);
            }else{
                $day->feedback()->create([
                   'q1'=>$request->q1,
                   'q2'=>$request->q2,
                   'q3'=>$request->q3,
                   'q4'=>$request->q4,
                   'comment'=>$request->comment,
                   'user_id'=>Auth::id()
                ]);
                return response()->json(['msg'=>'your feedback has been sent', "state"=>1]);
            }


    }
}
