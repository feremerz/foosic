<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
       // dd($this->route('user'));
        return [

            'name'=>'nullable|max:100',
            'email'=>'unique:users,email,'.$this->route('user'),
            'password'=>'nullable|min:8',
            'roles'=>'required',
            'status'=>'required',

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
