<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PollResource extends JsonResource
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
            'options'=>OptionResource::collection($this->options),
            'created_at'=>$this->created_at->format('d-m-Y h:i A'),
        ];
    }
}
