<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|min:2|unique:categories,name,'.$this->id.'|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống',
            'name.min'=>'Tên không được >2 kí tự',
            'name.max'=>'Tên không được <50 kí tự',
            'name.unique'=>'Tên đã tồn tại'
        ];
    }
}
