<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AskResource extends JsonResource
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
            'question'=>$this->question,
            'speaker'=>AccountResource::make($this->speaker),
            'user'=>AccountResource::make($this->user),
        ];
    }
}
