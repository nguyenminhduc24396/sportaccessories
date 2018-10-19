<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderPost extends FormRequest
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
            'address' => 'required|min:2|max:60',
            'shipping_id' => 'required|numeric',
            'payment_id' => 'required|numeric',
            'order_status_id' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Địa chỉ không được trống',
            'address.min' => 'Địa chỉ không được nhỏ hơn :min ký tự',
            'address.max' => 'Địa chỉ không được lớn hơn :max ký tự',
            'shipping_id.numeric' => 'vui lòng chọn hình thức giao hàng',
            'payment_id.numeric' => 'vui lòng chọn phương thức thanh toán',
            'order_status_id.numeric' => 'vui lòng chọn trạng thái',
        ];
    }
}
