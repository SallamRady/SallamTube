<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'name'=>'required|string|max:191',
            'description'=>'required',
            'meta_KeyWord'=>'max:191',
            'meta_des'=>'max:191',
            'poster'=>'image|mimes:jpeg,jpg,png,gif|max:10000',//10000kb
            'youtube_link'=>'required|url',
            'category_id'=>'required|int',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'This field is required',
            'description.required'=>'This field is required',
            'poster.required'=>'This field must be image',
            'poster.image'=>'This field is required',
            'youtube_link.required'=>'This field is required',
            'youtube_link.url'=>'This field must be url',
            'user_id.required'=>'This field is required',
            'category_id.required'=>'This field is required',
            'category_id.int'=>'This field should be integer',
            'user_id.int'=>'This field should be integer',
        ];
    }
}
