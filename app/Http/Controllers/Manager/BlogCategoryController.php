<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BlogCategory;
use App\Http\Requests\StoreBlogCategory;
use App\Http\Requests\UpdateBlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = BlogCategory::orderbyDesc('created_at')->get();
        return view('manager.blogs.blog-categories.index',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.blogs.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCategory $request)
    {
        BlogCategory::create($request->all());
        return redirect()->route('manager.blogs.blog_categories.index')->with('message','Đã thêm mới thành công.');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_category = BlogCategory::find($id);
        return view('manager.blogs.blog-categories.edit',['blog_category' => $blog_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCategory $request, $id)
    {
        $data = BlogCategory::find($id)->update($request->all());
        return redirect()->route('manager.blogs.blog_categories.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        BlogCategory::find($id)->delete();
        return back()->with('message','Đã xóa thành công');
    }
}