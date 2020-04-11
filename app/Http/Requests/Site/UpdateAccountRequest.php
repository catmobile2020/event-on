<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
        if ($this->routeIs('site.updateAccount'))
        {
            return [
                'name'=>'required',
                'email'=>'required|email|unique:users,email,'.$this->user()->id,
            ];
        }
        return [
            'current_password'=>'required',
            'password'=>'required|confirmed',
        ];
    }
}
