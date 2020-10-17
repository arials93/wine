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
            'bill_name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'bill_phone' => 'numeric|digits_between:10,11',
            'ship_name' => 'required_if:is_gift,true|max:255',
            'ship_phone' => 'required_if:is_gift,true|digits_between:10,11|nullable',
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
            'bill_name.required' => 'Vui lòng nhập họ tên',
            'bill_name.max' => 'Họ tên tối đa 255 ký tự',
            'bill_phone.numeric' => 'Vui lòng nhập số điện thoại',
            'bill_phone.digits_between' => 'Số điện thoại chỉ có 10 hoặc 11 số',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng email',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'ship_name.required_if' => 'Vui lòng nhập tên người nhận',
            'ship_phone.required_if' => 'Vui lòng nhập số điện thoại người nhận',
            'ship_phone.digits_between' => 'Số điện thoại chỉ có 10 hoặc 11 số',
        ];
    }
}
