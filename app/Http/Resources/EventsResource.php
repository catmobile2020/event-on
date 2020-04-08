<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventsResource extends JsonResource
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
            'name'=>$this->name,
            'status'=>$this->status,
            'remaining_time'=>$this->remaining_time,
            'description'=>$this->description,
            'start_date'=>Carbon::parse($this->start_date)->format('LLL'),
            'end_date'=>Carbon::parse($this->end_date)->format('LLL'),
            'city'=>$this->city,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'photo'=>$this->photo,
        ];
    }
}
