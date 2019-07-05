<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumStore extends FormRequest
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
            'release_date'=>'required',
            'price'=>'required',
            'slug'=>'required|unique:albums',
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'ورود نام الزامی است',
          'release_date.required'=>'ورود تاریخ انتشار الزامی است',
          'price.required'=>'ورود قیمت آلبوم الزامی است',
          'slug.required'=>'ورود نامک الزامی است',
            'slug.unique'=>'نامک تکراری است'
        ];
    }
}
