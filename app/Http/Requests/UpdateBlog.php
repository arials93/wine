<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreBlog;

class UpdateBlog extends StoreBlog
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $blog_id = request()->route('blog');
        return [
            //loại bỏ name đã tồn tại trong bảng blogs
            'name' => 'required|max:100|unique:blogs,name,'.$blog_id,
            //các id phải tồn tại trong các bảng
            'blog_category_id' => 'exists:blog_categories,id',
            'image' => 'mimes:jpg,png,jpeg,svg',
        ];
    }
}
