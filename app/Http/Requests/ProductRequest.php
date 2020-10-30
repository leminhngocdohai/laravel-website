<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|min:2',
            'code'=>'required|unique',
            'price'=>'required|numeric',
            'img'=>'required|image',
            'info'=>'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'tên không được bỏ trống',
            'name.min'=>'>2 kí tự',
            'code.required'=>'Code không được bỏ trống',
            'code.unique'=>'nhập trùng kìa man',
            'price.required'=>'Gía không được bỏ trống',
            'price.numeric'=>'dít i số',
            'img.required'=>'ảnh không được bỏ trống',
            'img.image'=>'dít i ảnh',
            'info.required'=>'thông tin không được bỏ trống',
            'info.min'=>'>6 kí tự'
        ];
    }
}
