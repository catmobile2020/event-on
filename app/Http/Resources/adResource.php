<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class adResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data=[
            'is_image'=>(boolean)$this->is_image,
        ];
        if ($this->is_image)
        {
            $data['photo']=$this->photo;
        }else
        {
            $data['video_url']=$this->video_url;
        }
        return $data;
    }
}
