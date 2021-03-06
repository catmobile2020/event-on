<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TalkResource extends JsonResource
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
            'title'=>$this->title,
            'desc'=>$this->desc,
            'location'=>$this->location,
            'time_from'=>$this->time_from,
            'time_to'=>$this->time_to,
            'speakers'=>AccountResource::collection($this->speakers()->active()->get()),
        ];
    }
}
