<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserStore extends FormRequest
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
            'name'=>'required|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'roles'=>'required',
            'status'=>'required',
            'file'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'ورود نام الزامی است',
            'email.required'=>'ورود نام الزامی است',
            'password.required'=>'ورود نام الزامی است',
            'roles.required'=>'ورود نام الزامی است',
        ];
    }
}
