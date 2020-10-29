<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BlogCategory;
use App\Model\Blog;

class BlogController extends Controller
{
    /**
     * Hiển thị bài viết theo loại
     *
     * @param  int  $id
     * @return View
     */
    public function index($blog_category)
    {
        $paginate = 4;
        if($blog_category == 0)
        {
            //Hiển thị tất cả bài viết
            $data['blogs'] = Blog::where('name','!=','Giới thiệu')->paginate($paginate);
        }
        else
        {
            //Hiển thị bài viết theo loại bài viết 
            $data['blogs'] = Blog::where('blog_category_id',$blog_category)->with('blog_category')->paginate($paginate);
        }
        return view('store.blogs.blogs',$data);
    }

    /**
     * Hiển thị chi tiết 1 bài viết
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $blog = Blog::findorFail($id);
        return view('store.blogs.blog-detail',['blog'=>$blog]);
    }
}
