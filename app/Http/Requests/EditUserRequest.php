<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'full'=>'required|min:2|max:250',
            'phone'=>'required|min:5|unique:users,phone,'.$this->id.'|max:250',
            'password'=>'required|min:6|max:250',
            'email'=>'required|min:6|unique:users,email,'.$this->id.'|max:250'
        ];
    }
    public function messages()
    {
        return [
            'full.required'=>'Tên không được để trống',
            'full.min'=>'Tên không được <2 kí tự',
            'full.max'=>'Tên không được >250 kí tự',
            'email.required'=>'Email không được để trống',
            'email.min'=>'Email không được <2 kí tự',
            'email.max'=>'Email không được >250 kí tự',
            'email.unique'=>'Email đã tồn tại',
            'phone.required'=>'SDT không được để trống',
            'phone.min'=>'SDT không được <2 kí tự',
            'phone.max'=>'SDT không được >250 kí tự',
            'phone.unique'=>'SDT đã tồn tại',
            'password.required'=>'MAT KHAU không được để trống',
            'password.min'=>'MAT KHAU không được <2 kí tự',
            'password.max'=>'MAT KHAU không được >250 kí tự',
        ];
    }
}
