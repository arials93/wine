<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|max:100',
            'image' => 'mimes:jpg,png,jpeg,svg',
            'address' => 'nullable|max:255',
            'phone' => 'nullable|digits_between:10,11',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'is_admin' => 'required', 
            'password' => 'required|between:8,30',
            're-password' => 'required|same:password',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Xin hãy nhập họ và tên.',
            'name.max' => 'Họ và tên không lớn hơn 100 ký tự.',
            'image.mimes' => 'Hình ảnh phải thuộc các dạng sau: jpg,png,jpeg,svg.',
            'image.uploaded' => 'Hình ảnh có thể bị lỗi vui lòng chọn ảnh khác.',
            'address.max' => 'Địa chỉ không lớn hơn 255 ký tự.',
            'phone.digits_between' => 'Số điện thoại phải có từ :min - :max ký tự số.',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng email',
            'email.unique' => 'Tài khoản này đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.between' => 'Mật khẩu phải có từ :min - :max ký tự.',
            're-password.required' => 'Vui lòng nhập lại mật khẩu.',
            're-password.same' => 'Mật khẩu nhập lại không khớp với mật khẩu.',
        ];
    }
}
