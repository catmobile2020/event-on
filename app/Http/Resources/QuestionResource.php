<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'speaker'=>AccountResource::make($this->speaker),
            'question'=>$this->question,
            'answers'=>AnswerResource::collection($this->answers),
            'created_at'=>$this->created_at->format('d-m-Y h:i A'),
        ];
    }
}
