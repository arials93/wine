<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\SubCategory;

class ProductController extends Controller
{
    /**
     * Hiển thị sản phẩm theo loại
     *
     * @param  int  $id
     * @return View
     */
    public function index($category, $sub_category)
    {
        $paginate = 1;
        if($sub_category == 0)
        {
            //Hiển thị sản phẩm theo loại sản phẩm cha (xem tất cả)
            //Lấy dữ liệu trong relations của Category là products
            $data['products'] = Category::where('id',$category)->where->with(['sub_categories'])->first()->products()->paginate($paginate);
        }
        else
        {
            //Hiển thị sản phẩm theo loại sản phẩm con
            $data['products'] = Product::where('sub_category_id',$sub_category)->where('instock','>',0)->with('sub_category')->paginate($paginate);
        }
        return view('store.products.products',$data);
    }

    /**
     * Hiển thị chi tiết 1 sản phẩm
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $product = Product::findorFail($id);
        return view('store.products.product-detail',['product'=>$product]);
    }
}
