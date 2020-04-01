<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DaysResource extends JsonResource
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
            'date'=>$this->date,
            'photo'=>$this->photo,
        ];
    }
}
