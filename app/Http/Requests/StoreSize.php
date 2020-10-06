<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSize extends FormRequest
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
            'size' => 'required|integer|between:25,2000',
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
            'size.required' => 'Xin hãy nhập dung tích.',
            'size.integer' => 'Dung tích phải là số.',
            'size.between' => 'Dung tích phải có giá trị từ :min - :max.',
        ];
    }
}
