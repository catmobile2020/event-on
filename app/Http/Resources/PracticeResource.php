<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PracticeResource extends JsonResource
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
            'has_rate'=>(boolean)$this->has_rate,
            'options'=>OptionResource::collection($this->options),
            'created_at'=>$this->created_at->format('d-m-Y h:i A'),
        ];
    }
}
