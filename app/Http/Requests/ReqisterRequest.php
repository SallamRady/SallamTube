<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReqisterRequest extends FormRequest
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
            'email'=>'required|email|unique:users',
            'name'=>'required|string|min:4|max:40',
            'password'=>'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation'=>'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.regex'=>'The password must be at least 8 chars,have at least 1 Upper Case , 1 Lower Case , 1 Numeric ,and anther char',
        ];
    }
}
