<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreSubCategory;

class UpdateSubCategory extends StoreSubCategory
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $sub_category_id = request()->route('sub_category');
        return [
            //loại bỏ name đã tồn tại trong bảng sub_categories 
            'name' => 'required|max:100|unique:sub_categories,name,'.$sub_category_id,
            //category_id phải tồn tại trong bảng categories
            'category_id' => 'exists:categories,id',
            'image' => 'mimes:jpg,png,jpeg,svg',
        ];
    }
}
