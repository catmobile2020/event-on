<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'title'=>$this->title,
            'is_image'=>(boolean)$this->is_image,
            'button'=>[
                'text'=>$this->btn_text,
                'color'=>$this->btn_color,
                'url'=>$this->btn_url,
            ],
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
