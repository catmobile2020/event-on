<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Site\AnswerRequest;
use App\Http\Requests\Site\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionsResource;
use App\Question;
use App\User;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth_type:1')->except('addAnswer');
    }

    /**
     *
     * @SWG\Get(
     *      tags={"questions"},
     *      path="/speakers/{speaker}/questions",
     *      summary="get speaker Questions paginated",
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
        $rows = $speaker->ownerQuestions()->paginate($this->api_paginate_num);
        return QuestionsResource::collection($rows);
    }

    /**
     * @SWG\Post(
     *      tags={"questions"},
     *      path="/speakers/{speaker}/questions",
     *      summary="add new question",
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
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param User $speaker
     * @param QuestionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(User $speaker,QuestionRequest $request)
    {
        $question =$speaker->ownerQuestions()->create($request->all());
        if ($question)
        {
            return $this->responseJson('Done Successfully',200);
        }
        return $this->responseJson('Error Happen, Try Again!',400);
    }

    /**
     *
     * @SWG\Get(
     *     tags={"questions"},
     *      path="/questions/{question}",
     *      summary="get single question",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="question",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Question $question
     * @return QuestionResource
     */
    public function show(Question $question)
    {
        return QuestionResource::make($question);
    }

    /**
     *
     * @SWG\Post(
     *     tags={"questions"},
     *      path="/questions/{question}/destroy",
     *      summary="get single question",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="question",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return $this->responseJson('Done Successfully',200);
    }

    /**
     *
     * @SWG\post(
     *      tags={"questions"},
     *      path="/questions/{question}/add-answer",
     *      summary="submit your vot",
     *      security={
     *          {"jwt": {}}
     *      },@SWG\Parameter(
     *         name="question",
     *         in="path",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Parameter(
     *         name="answer",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Question $question
     * @param AnswerRequest $request
     * @return array
     */
    public function addAnswer(Question $question,AnswerRequest $request)
    {
        $auth_user = auth()->user();
        if ($question->answers()->where('user_id',$auth_user->id)->first())
        {
            return $this->responseJson('You Add Answer To This Question Before.',400);
        }
        $inputs = $request->all();
        $inputs['user_id'] = $auth_user->id;
        $answer = $question->answers()->create($inputs);
        if ($answer)
        {
            return $this->responseJson('Send Successfully',200);
        }
        return $this->responseJson('Error Happen, Try Again!',400);
    }
}
