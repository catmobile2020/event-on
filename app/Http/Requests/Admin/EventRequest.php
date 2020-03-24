<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        return [
            'name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'city'=>'required',
            'active'=>'required',
            'admin_ids'=>'required|array|min:1',
            'admin_ids.*'=>'integer',
        ];
    }
}
