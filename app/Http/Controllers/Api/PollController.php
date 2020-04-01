<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\PollRequest;
use App\Http\Requests\Site\UserPollRequest;
use App\Http\Resources\PollsResource;
use App\Poll;
use App\User;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_type:1')->except('addVote');
    }

    /**
     *
     * @SWG\Get(
     *      tags={"polls"},
     *      path="/speakers/{speaker}/polls",
     *      summary="get speaker polls paginated",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="speaker",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param User $speaker
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(User $speaker)
    {
        $rows = $speaker->ownerPolls()->with('options')->paginate($this->api_paginate_num);
        return PollsResource::collection($rows);
    }

    /**
     * @SWG\Post(
     *      tags={"polls"},
     *      path="/speakers/{speaker}/polls",
     *      summary="add new poll",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="speaker",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Parameter(
     *         name="question",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),
     *      @SWG\Parameter(
     *         name="options[]",
     *         in="formData",
     *         required=true,
     *        type="array",
     *         collectionFormat="multi",
     *         uniqueItems=true,
     *         @SWG\Items(
     *           type="string",
     *         ),
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param User $speaker
     * @param PollRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
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
            return $this->responseJson('Done Successfully',200);
        }
        return $this->responseJson('Error Happen, Try Again!',400);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"polls"},
     *      path="/polls/{poll}/destroy",
     *      summary="get single poll",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="poll",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Poll $poll
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(Poll $poll)
    {
        return PollsResource::collection($poll);
    }

    /**
     *
     * @SWG\Post(
     *      tags={"polls"},
     *      path="/polls/{poll}/destroy",
     *      summary="submit your vot",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="poll",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();
        return $this->responseJson('Send Successfully',200);
    }

    /**
     *
     * @SWG\post(
     *      tags={"polls"},
     *      path="/polls/{poll}/add-vote",
     *      summary="submit your vot",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="poll",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Parameter(
     *         name="poll_option_id",
     *         in="formData",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Poll $poll
     * @param UserPollRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addVote(Poll $poll,UserPollRequest $request)
    {
        $auth_user = auth()->user();
        if ($poll->userPolls()->where('user_id',$auth_user->id)->first())
        {
            return $this->responseJson('You Already Submit this Vot Before.',400);
        }
        $vot = $poll->userPolls()->create([
            'poll_option_id'=>$request->poll_option_id,
            'user_id'=>$auth_user->id,
        ]);
        if ($vot)
        {
            return $this->responseJson('Send Successfully',200);
        }
        return $this->responseJson('Error Happen, Try Again!',400);
    }
}
