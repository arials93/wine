<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Category;
use App\Http\Requests\StoreSubCategory;
use App\Http\Requests\UpdateSubCategory;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 5;
        $categories = Category::all();        
        // Tìm kiếm loại sản phẩm con theo tên
        if ($request->search)
        {
            //Tên và loại cha
            if ($request->category) {
                $datas = SubCategory::where('name','LIKE','%'.$request->search.'%')
                                ->where('category_id', $request->category)->with('category')->paginate($paginate);
            }
            //Tên
            else {
                $datas = SubCategory::where('name','LIKE','%'.$request->search.'%')->with('category')->paginate($paginate);
            }
        }
        else {
            //Loại cha
            if($request->category) {
                $datas = SubCategory::where('category_id',$request->category)->with('category')->paginate($paginate);
            }
            else {
                $datas = SubCategory::orderbyDesc('created_at')->with('category')->paginate($paginate);
            }   
        }
        return view('manager.products.sub-categories.index',['datas' => $datas,'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('manager.products.sub-categories.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategory $request)    
    {
        $path = $request->file('image')->store('sub_categories','public');
        $data = $request->all();
        $data['image'] = $path;
        SubCategory::create($data);
        return redirect()->route('manager.products.sub_categories.index')->with('message','Đã thêm mới thành công');
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
        $sub_category = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('manager.products.sub-categories.edit',['sub_category' => $sub_category,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategory $request, $id)
    {
        $data = $request->all();
        $sub_category = SubCategory::findOrFail($id);
        if($request->file('image')) {
            $path = $request->file('image')->store('sub_categories', 'public');
            $data['image'] = $path;
            
            // xóa hình cũ
            if(Storage::disk('public')->exists($sub_category->image)) {
                Storage::disk('public')->delete($sub_category->image);
            }
        }
        $sub_category->update($data);
        return redirect()->route('manager.products.sub_categories.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        // xóa hình cũ
        if(Storage::disk('public')->exists($sub_category->image)) {
            Storage::disk('public')->delete($sub_category->image);
        }
        $sub_category->delete();
        return back()->with('message','Đã xóa thành công');
    }
}