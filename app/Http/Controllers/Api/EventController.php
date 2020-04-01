<?php

namespace App\Http\Controllers\Api;

use App\Day;
use App\Event;
use App\Filters\EventFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Http\Resources\DayResource;
use App\Http\Resources\DaysResource;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     *
     * @SWG\Get(
     *      tags={"events"},
     *      path="/my-schedule",
     *      summary="get all schedule events paginated",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="month",
     *         in="query",
     *         type="integer",
     *      ),@SWG\Parameter(
     *         name="topic",
     *         in="query",
     *         type="string",
     *      ),@SWG\Parameter(
     *         name="speaker_id",
     *         in="query",
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param EventFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function schedule(EventFilter $filter)
    {
        $auth_user = auth()->user();
        $rows = $auth_user->myEvents()->filter($filter)->orderByDesc('start_date')->paginate($this->api_paginate_num);
        return EventResource::collection($rows);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"events"},
     *      path="/events",
     *      summary="get all events events paginated",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     */
    public function events()
    {
        $company = auth()->user()->company;
        $rows = $company->events()->active()->orderByDesc('start_date')->paginate($this->api_paginate_num);
        return EventResource::collection($rows);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"events"},
     *      path="/events/{event}",
     *      summary="get single event",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="event",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Event $event
     * @return EventResource
     */
    public function show(Event $event)
    {
        return EventResource::make($event);
    }

    /**
     *
     * @SWG\Post(
     *      tags={"events"},
     *      path="/events/{event}/register-to-event",
     *      summary="get single event",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="event",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerToEvent(Event $event)
    {
        $auth_user = auth()->user();
        if ($auth_user->myEvents()->where('event_id',$event->id)->first())
        {
            return $this->responseJson('You Already Registered on This Event Before!',400);
        }
        $auth_user->myEvents()->attach($event);
        return $this->responseJson('Thank You For Registration',200);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"events"},
     *      path="/events/{event}/days",
     *      summary="get event days paginated",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="event",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Event $event
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function days(Event $event)
    {
        $days = $event->days()->active()->with('talks')->paginate($this->api_paginate_num);
        return DaysResource::collection($days);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"events"},
     *      path="/days/{day}",
     *      summary="get single day",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="day",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Day $day
     * @return DayResource
     */
    public function singleDay(Day $day)
    {
        return DayResource::make($day);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"events"},
     *      path="/events/{event}/speakers",
     *      summary="get event speakers",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="event",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Event $event
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function speakers(Event $event)
    {
        $speakers =collect([]);
        $talks =  $event->talks;
        foreach ($talks as $i=>$talk)
        {
            $speakers = $speakers->merge($talk->speakers);
        }
        $rows = $speakers->unique('id');
        return AccountResource::collection($rows);
    }

}
