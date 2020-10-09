<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreBlogCategory;

class UpdateBlogCategory extends StoreBlogCategory
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $blog_category_id = request()->route('blog_category');
        return [
            //loại bỏ name đã tồn tại trong bảng blog_categories 
            'name' => 'required|max:100|unique:blog_categories,name,'.$blog_category_id,
        ];
    }
}
