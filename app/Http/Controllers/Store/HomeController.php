<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Blog;

class HomeController extends Controller
{
    /**
     * Hiển thị sản phẩm, bài viết cho trang chu
     *
     * @return View
     */
    public function index()
    {
        $data['products'] = Product::inRandomOrder()->with('sub_category')->limit(8)->get();
        $data['blogs'] = Blog::orderBy('created_at')->with('blog_category')->limit(4)->get();
        return view('store.index',$data);
    }
}
