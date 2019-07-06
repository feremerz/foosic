<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArtistStore extends FormRequest
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
            'slug'=>'required|unique:artists',
            'art_id'=>'required',
            'categories'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'ورود نام الزامی است',
            'slug.required'=>'ورود نامک الزامی است',
            'slug.unique'=>'نامک تکراری است',
            'art_id.required'=>'ورود نوع هنرمند الزامی است',
            'categories.required'=>'تعیین دسته بندی الزامی است',
        ];
    }
}
