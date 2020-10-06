<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreCategory;

class UpdateCategory extends StoreCategory
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $category_id = request()->route('category');
        return [
            //loại bỏ name đã tồn tại trong bảng categories 
            'name' => 'required|max:100|unique:categories,name,'.$category_id,
        ];
    }
}
