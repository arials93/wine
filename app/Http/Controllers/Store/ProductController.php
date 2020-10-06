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
            $data['products'] = Product::join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
                                        ->join('categories', function ($join) use ($category){
                                            $join->on('categories.id', '=', 'sub_categories.category_id')
                                                ->where('categories.id','=',$category);
                                            })
                                        ->select('products.*')
                                        ->paginate($paginate);
            // $data['products'] = Category::where('id',$category)->with(['products','sub_categories'])->first()->products->paginate($paginate);//Lấy dữ liệu trong relations products
            //Tránh truy vấn query nhiều lần trong 1 mối quan hệ thông qua with() -- Phía product có sử dụng sub_category
        }
        else
        {
            //Hiển thị sản phẩm theo loại sản phẩm con
            // $data['products'] = SubCategory::with('products')->where('id',$sub_category)->first()->products->paginate($paginate);
            $data['products'] = Product::where('sub_category_id',$sub_category)->with('sub_category')->paginate($paginate);
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
