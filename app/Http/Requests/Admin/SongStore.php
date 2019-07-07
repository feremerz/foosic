<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SongStore extends FormRequest
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
            'album_id'=>'required',
            'categories'=>'required',
            'status'=>'required',
            'photo'=>'required',
            'file128'=>'required_without:file320',
            'file320'=>'required_without:file128',
        ];
    }
}
