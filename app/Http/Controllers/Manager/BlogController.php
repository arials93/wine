<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\BlogCategory;
use App\Model\Blog;
use App\Http\Requests\StoreBlog;
use App\Http\Requests\UpdateBlog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $paginate = 5;
        $blog_categories = BlogCategory::all();
        //filter by name
        if ($request->search) {
            //Tên và loại bài viết
            if ($request->blog_category) {
                $datas = Blog::where('name','LIKE','%'.$request->search.'%')
                                ->where('blog_category_id', $request->blog_category)->with(['blog_category','user'])->paginate($paginate);
            }
            //Tên
            else {
                $datas = Blog::where('name','LIKE','%'.$request->search.'%')->with(['blog_category','user'])->paginate($paginate);
            }       
        }else {
            if($request->blog_category)
            {
                $datas = Blog::where('blog_category_id',$request->blog_category)->with(['blog_category','user'])->paginate($paginate);
            }
            else
            {
                $datas = Blog::orderbyDesc('created_at')->with(['blog_category','user'])->paginate($paginate);
            }
        }
        return view('manager.blogs.index', ['datas' => $datas,'blog_categories' => $blog_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view('manager.blogs.create',['blog_categories' => $blog_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlog $request)
    {
        $path = $request->file('image')->store('blogs','public');
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $path;
        Blog::create($data);
        return redirect()->route('manager.blogs.index')->with('message','Đã thêm mới thành công');
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
        $blog= Blog::findOrFail($id);
        $blog_categories = BlogCategory::all();
        return view('manager.blogs.edit', ['blog' => $blog,'blog_categories' => $blog_categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlog $request, $id)
    {
        $data = $request->all();
        $blog = Blog::findOrFail($id);
        if($request->file('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $data['image'] = $path;

            // xóa hình cũ
            if(Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
        }
        $data['user_id'] = auth()->user()->id;
        $blog->update($data);
        return redirect()->route('manager.blogs.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        // xóa hình cũ
        if(Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return back()->with('message','Đã xóa thành công');
    }
}
