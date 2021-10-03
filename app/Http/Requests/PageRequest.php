<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'name'=>'required|max:191',
            'description'=>'required|min:10',
            'meta_KeyWord'=>'max:191',
            'meta_des'=>'max:191',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'The Name is required',
            'name.string'=>'The Name is invalid',
            'name.max'=>'The Name should be at most 191 char',
            'meta_KeyWord.max'=>'This field should be at most 191 char',
            'meta_des.max'=>'This field should be at most 191 char',
            'description.required'=>'The Name is required',
            'description.min'=>'The Description must be at least 8 char',
        ];
    }
}
