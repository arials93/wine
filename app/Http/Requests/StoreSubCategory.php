<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategory extends FormRequest
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
            'name' => 'required|unique:sub_categories,name|max:100',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
            'category_id' => 'exists:categories,id',
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
            'name.required' => 'Xin hãy nhập tên.',
            'name.unique' => 'Tên này đã tồn tại.',
            'name.max' => 'Tên không lớn hơn 100 ký tự.',
            'image.required' => 'Xin hãy chọn hình ảnh muốn tải lên.',
            'image.mimes' => 'Hình ảnh phải thuộc các dạng sau: jpg,png,jpeg,svg.',
            'image.uploaded' => 'Hình ảnh có thể bị lỗi vui lòng chọn ảnh khác.',
            'category_id.exists' => 'Loại sản phẩm này không tồn tại.'
        ];
    }
}
