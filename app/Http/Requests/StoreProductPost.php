<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'namepd' => 'required|min:2|max:60|unique:products,namepd',
            'category_id' => 'required|numeric',
            'price' => 'numeric',
            'qty' => 'numeric',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
            'description' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'namepd.required' => 'Tên sản phẩm không được trống',
            'namepd.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
            'namepd.max' => 'Tên sản phẩm không được lớn hơn :max ký tự',
            'namepd.unique' => 'Tên sản phẩm đã tồn tại',
            'category_id.numeric' => 'vui lòng chọn danh mục',
            'price.numeric' => 'vui lòng nhập giá tiền',
            'qty.numeric' => 'vui lòng nhập số lượng',
            'image.mimes' => 'định dạng file không đúng',
            'description.required' => 'Mô tả không được trống',
            'description.min' => 'Mô tả không được nhỏ hơn :min ký tự',
        ];
    }
}
