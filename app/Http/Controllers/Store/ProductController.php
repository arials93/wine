<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Brand;
use App\Model\Size;
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
    public function index(Request $request, $category, $sub_category, $sub_category_id = null)
    {
        $paginate = 1;
        
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        $sizes = Size::all();

        $data = [
            'sub_categories' => $sub_categories,
            'brands' => $brands,
            'sizes' => $sizes,
        ];
        
        $search_data = [];
        if($request->sub_category) {
            array_push($search_data, [
                'sub_category_id', '=', $request->sub_category
            ]);
        }
        
        if ($sub_category_id) {
            array_push($search_data, [
                'sub_category_id', '=', $sub_category
            ]);
        }

        if($request->size) {
            array_push($search_data, [
                'size_id', '=', $request->size
            ]);
        }
        if($request->brand) {
            array_push($search_data, [
                'brand_id', '=', $request->brand
            ]);
        }
        if($request->name) {
            array_push($search_data, [
                'products.name', 'LIKE', '%'.$request->name.'%'
            ]);
        }

        $products = null;
        if($sub_category == 0 || count($search_data) > 0)
        {
            //Hiển thị sản phẩm theo loại sản phẩm cha (xem tất cả)
            //Lấy dữ liệu trong relations của Category là products
            $products = Category::where('id',$category)->first()->products()->where($search_data)->where('instock','>',0);
        }
        else
        {
            //Hiển thị sản phẩm theo loại sản phẩm con
            $products = Product::where('sub_category_id',$sub_category)->where('instock','>',0)->with('sub_category');
        }

        if($request->price_filter) {
            $products->orderBy('price', $request->price_filter);
        }
        
        $data['products'] = $products->paginate($paginate);
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
