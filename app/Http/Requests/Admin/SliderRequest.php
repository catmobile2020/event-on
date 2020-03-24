<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'is_image'=>'required',
            'active'=>'required',
        ];
        if ($this->request->get('is_image') == 1)
        {

            if ($this->routeIs('admin.sliders.store'))
            {
                $rules['photo']='required|image|mimes:jpeg,jpg,png,svg,gif|max:200000';
            }else
            {
                $rules['photo']='nullable|image|mimes:jpeg,jpg,png,svg,gif|max:200000';
            }
        }else
        {
            $rules['video_url']='required|url';
        }
        return $rules;
    }
}
