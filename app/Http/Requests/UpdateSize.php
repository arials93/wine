<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreSize;

class UpdateSize extends StoreSize
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $size_id = request()->route('size');
        return [
            //loại bỏ name đã tồn tại trong bảng sizes 
            'size' => 'required|integer|between:25,2000|unique:sizes,size,'.$size_id, 
        ];
    }
}
