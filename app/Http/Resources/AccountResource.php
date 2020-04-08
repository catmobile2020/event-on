<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'id' =>$this->id,
            'name' =>$this->name,
            'email' =>$this->email,
            'phone' =>$this->phone,
            'bio' =>$this->bio,
            'type' =>$this->type,
            'specialty' =>$this->specialty,
            'address' =>$this->address,
            'city' =>$this->city,
            'company' =>CompanyResource::make($this->company),
            'country' =>CountryResource::make($this->country),
            'photo' =>$this->photo,
        ];
    }
}
