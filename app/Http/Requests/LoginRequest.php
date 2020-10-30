<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|max:250',
            'password'=>'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'không được bỏ trống',
            'email.max'=>'không được >250 kí tự',
            'password.required'=>'không được bỏ trống',
            'password.min'=>'không được <6 kí tự'
        ];
    }
}
