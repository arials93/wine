<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Blog;
use App\Model\BlogCategory;
use App\Model\Brand;

class HomeController extends Controller
{
    /**
     * Hiển thị sản phẩm, bài viết cho trang chu
     *
     * @return View
     */
    public function index()
    {
        $data['products'] = Product::inRandomOrder()->where('instock','>',0)->with('sub_category')->limit(8)->get();
        $data['blogs'] = Blog::where('name','!=','Giới thiệu')->orderBy('created_at')->with('blog_category')->limit(4)->get();
        $data['brands'] =  Brand::all();
        $data['about'] = Blog::where('name','Giới thiệu')->first();
        // dd($data['about']);
        return view('store.index',$data);
    }
}
