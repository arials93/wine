<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreBrand;

class UpdateBrand extends StoreBrand
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $brand_id = request()->route('brand');
        return [
            //loại bỏ name đã tồn tại trong bảng brands 
            'name' => 'required|max:100|unique:brands,name,'.$brand_id,
            //country_id phải tồn tại trong bảng categories
            'country_id' => 'exists:countries,id',
            'image' => 'mimes:jpg,png,jpeg,svg',
        ];
    }
}
