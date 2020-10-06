<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
        $year = now()->year;
        return [
            'name' => 'required|unique:products,name|max:100',
            'barcode' => 'nullable|unique:products,barcode|digits_between:9,13',//barcode phải có từ 9 đến 13 ký tự số
            'abv' => 'nullable|numeric|between:4,50',//abv là số nằm trong khoảng 4 đến 50 độ
            'vintage' => 'nullable|integer|between:1900,'.$year,
            'price' => 'required|integer|min:50000',
            'sale' => 'required|integer|between:0,10', //tỉ lệ giảm giá nằm trong 0 đến 10%
            'instock' => 'required|integer|between:0,200', //hàng tồn chỉ trong khoảng 200 chai
            'image' => 'required|mimes:jpg,png,jpeg,svg',
            'sub_category_id' => 'exists:sub_categories,id',
            'brand_id' =>'exists:brands,id',
            'size_id' =>'exists:sizes,id',
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
            'barcode.unique' => 'Mã vạch này đã tồn tại.',
            'barcode.digits_between' => 'Mã vạch phải có từ :min - :max ký tự số.',
            'abv.numeric' => 'Nồng độ cồn phải là số.',
            'abv.between' => 'Nồng độ cồn phải có giá trị từ :min - :max độ.',
            'vintage.integer' => 'Năm sản xuất phải là số nguyên.',
            'vintage.between' => 'Năm sản xuất phải thuộc từ năm :min - năm :max',
            'price.required' => 'Xin hãy nhập giá sản phẩm.',
            'price.integer' => 'Giá sản phẩm phải là số nguyên.',
            'price.min' => 'Giá sản phẩm có giá trị thấp nhất là :min VNĐ.',
            'sale.required' => 'Xin hãy nhập tỉ lệ giảm giá.',
            'sale.integer' => 'Tỉ lệ giảm giá phải là số nguyên.',
            'sale.between' => 'Tỉ lệ giảm giá phải có giá trị từ :min% - :max%',
            'instock.required' => 'Xin hãy nhập số lượng tồn.',
            'instock.integer' => 'Số lượng tồn phải là số nguyên.',
            'sale.between' => 'Số lượng tồn phải có giá trị từ :min% - :max% chai',
            'image.required' => 'Xin hãy chọn hình ảnh muốn tải lên.',
            'image.mimes' => 'Hình ảnh phải thuộc các dạng sau: jpg,png,jpeg,svg.',
            'image.uploaded' => 'Hình ảnh có thể bị lỗi vui lòng chọn ảnh khác.',
            'sub_category_id.exists' => 'Loại sản phẩm này không tồn tại.',
            'brand_id.exists' => 'Nhãn hiệu này không tồn tại.',
            'size_id.exists' => 'Dung tích này không tồn tại.',
        ];
    }
}
