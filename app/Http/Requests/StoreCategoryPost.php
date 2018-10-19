<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryPost extends FormRequest
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
            'name_cat' => 'required|min:3|unique:categories,name_cat',
        ];
    }
    public function messages(){
        return [
            'name_cat.unique' => 'Tên danh mục đã tồn tại',
            'name_cat.required' => 'Tên danh mục không được trống',
            'name.min' => 'Tên danh mục không được nhỏ hơn :min ký tự',
        ];
    }
}
