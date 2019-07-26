<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SongUpdate extends FormRequest
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
            'is_album'=>'required',
            'slug'=>Rule::unique('songs')->ignore($this->route('song')),
            'price'=>'required',
            'engName'=>'required',
            'categories'=>'required',
            'signers'=>'required',
            'status'=>'required',


        ];
    }
}
