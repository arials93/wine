<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'phone' => 'numeric|digits_between:10,11',
            'address' => 'required',
        ];
    }

        /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.max' => 'Họ tên tối đa 255 ký tự',
            'phone.numeric' => 'Vui lòng nhập số điện thoại',
            'phone.digits_between' => 'Số điện thoại chỉ có 10 hoặc 11 số',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng email',
            'address.required' => 'Vui lòng nhập địa chỉ'
        ];
    }
}
