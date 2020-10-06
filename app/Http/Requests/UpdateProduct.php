<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreProduct;

class UpdateProduct extends StoreProduct
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $product_id = request()->route('product');
        return [
            //loại bỏ name đã tồn tại trong bảng products 
            'name' => 'required|max:100|unique:products,name,'.$product_id,
            //các id phải tồn tại trong các bảng
            'sub_category_id' => 'exists:sub_categories,id',
            'size_id' => 'exists:sizes,id',
            'brand_id' => 'exists:brands,id',
            'image' => 'mimes:jpg,png,jpeg,svg',
        ];
    }
}
