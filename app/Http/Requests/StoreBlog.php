<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
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
            'name' => 'required|unique:blogs,name|max:100',
            'sub_description' => 'required|max:500,',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
            'blog_category_id' => 'exists:blog_categories,id',
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
            'name.required' => 'Xin hãy nhập tên bài viết.',
            'name.unique' => 'Tên này đã tồn tại.',
            'name.max' => 'Tên không lớn hơn 100 ký tự.',
            'sub_description.required' => 'Xin hãy nhập tóm tắt bài viết.',
            'sub_description.max' => 'Tóm tắt không lớn hơn 500 ký tự.',
            'image.required' => 'Xin hãy chọn hình ảnh muốn tải lên.',
            'image.mimes' => 'Hình ảnh phải thuộc các dạng sau: jpg,png,jpeg,svg.',
            'image.uploaded' => 'Hình ảnh có thể bị lỗi vui lòng chọn ảnh khác.',
            'blog_category_id.exists' => 'Loại bài viết này không tồn tại.',
        ];
    }
}
