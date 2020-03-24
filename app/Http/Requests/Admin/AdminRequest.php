<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $data = [
            'name' => 'required|max:191',
            'active' => 'required',
        ];

        if ($this->routeIs('admin.admins.update'))
        {
            $data['email']='required|email|unique:admins,email,'.$this->admin->id;
            if ($this->request->get('password'))
            {
                $data['password']='required|confirmed|min:6';
            }
        }else
        {
            $data['email']='required|email|unique:admins,email';
            $data['password']='required|confirmed|min:6';
        }
        return $data;
    }
}
