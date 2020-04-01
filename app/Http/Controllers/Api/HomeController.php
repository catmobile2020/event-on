<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AccountResource;
use App\Http\Resources\adResource;
use App\Http\Resources\EventsResource;
use App\Http\Resources\SliderResource;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     *
     * @SWG\Get(
     *      tags={"home"},
     *      path="/home",
     *      summary="get home details (sliders , event , video , ads)",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function home()
    {
        $company = auth()->user()->company;
        $upcoming_event =$company->events()->active()->where(function ($q){
            $q->where('start_date','>=',today())->orWhere('end_date','>',today());
        })->orderBy('start_date')->first();
        $data =[
            'sliders' =>SliderResource::collection($company->sliders()->active()->get()),
            'event'=>$upcoming_event ? EventsResource::make($upcoming_event) : null,
            'video'=>$company->intro_video,
            'ads'=>adResource::collection($company->ads()->active()->get()),
        ];
        return response()->json($data,200);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"speakers"},
     *      path="/speakers",
     *      summary="get speakers paginated",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function speakers()
    {
        $company = auth()->user()->company;
        $rows =$company->speakers()->active()->paginate($this->api_paginate_num);
        return AccountResource::collection($rows);
    }
}
