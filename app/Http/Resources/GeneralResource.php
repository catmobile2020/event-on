<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'value'=>$this->value
        ];
        if ($this->type == 3)
        {
            $data['photo'] = $this->photo;
        }
        return $data;
    }
}
