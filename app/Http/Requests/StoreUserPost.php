<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:2|max:60',
            'phone' => 'required|min:10|max:11',
            'address' => 'required|min:3',
        ];
    }
    public function messages(){
        return [
            'password.required' => 'Mật khẩu không được trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min ký tự',
            'email.required' => 'Email không được trống',
            'email.email' => 'Email phải là dạng email',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Tên không được trống',
            'name.min' => 'Tên không được nhỏ hơn :min ký tự',
            'name.max' => 'Tên không được lớn hơn :max ký tự',
            'phone.required' => 'Số điện thoại không được trống',
            'phone.min' => 'Số điện thoại không được nhỏ hơn :min ký tự',
            'phone.max' => 'Số điện thoại không được lớn hơn :max ký tự',
            'address.required' => 'Địa chỉ không được trống',
            'address.min' => 'Địa chỉ không được nhỏ hơn :min ký tự',
        ];
    }
}
