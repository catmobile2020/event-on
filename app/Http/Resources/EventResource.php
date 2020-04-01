<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        $status = Carbon::parse($this->end_date)->diffInMinutes(today());
        $status = null;
        if ($this->end_date < today())
        {
            $status = 'Completed';
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'status'=>$status,
            'description'=>$this->description,
            'start_date'=>Carbon::parse($this->start_date)->isoFormat('LL'),
            'end_date'=>Carbon::parse($this->end_date)->isoFormat('LL'),
            'city'=>$this->city,
            'address'=>$this->address,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'photo'=>$this->photo,
        ];
    }
}
