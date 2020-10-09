<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\Brand;
use App\Model\Size;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 5;
        //filter by name
        if ($request->search) {
            //Tên, loại sản phẩm và nhãn hiệu
            if ($request->sub_category && $request->brand) {
                $datas = Product::where('name','LIKE','%'.$request->search.'%')
                                ->where('sub_category_id', $request->sub_category)
                                ->where('brand_id', $request->brand)->with('sub_category')->with('brand')->paginate($paginate);
            }
            //Tên và nhãn hiệu
            elseif ($request->brand) {
                $datas = Product::where('name','LIKE','%'.$request->search.'%')
                                ->where('brand_id', $request->brand)->with('sub_category')->with('brand')->paginate($paginate);
            }
            //Tên và loại sản phẩm
            elseif ($request->sub_category) {
                $datas = Product::where('name','LIKE','%'.$request->search.'%')
                                ->where('sub_category_id', $request->sub_category)->with('sub_category')->with('brand')->paginate($paginate);
            }
            //Tên
            else {
                $datas = Product::where('name','LIKE','%'.$request->search.'%')->with('sub_category')->with('brand')->paginate($paginate);
            }       
        }
        else {
            //Loại và nhãn hiệu
            if($request->sub_category && $request->brand) {
                $datas = Product::where('sub_category_id', $request->sub_category)
                                ->where('brand_id', $request->brand)->with('sub_category')->with('brand')->paginate($paginate);
            }
            //Loại
            elseif ($request->sub_category) {
                $datas = Product::where('sub_category_id',$request->sub_category)->with('sub_category')->with('brand')->paginate($paginate);
            }
            //Nhãn hiệu
            elseif ($request->brand) {
                $datas = Product::where('brand_id',$request->brand)->with('sub_category')->with('brand')->paginate($paginate);
            }
            //Không có tìm kiếm
            else {
                $datas = Product::orderbyDesc('created_at')->with('sub_category')->with('brand')->paginate($paginate);
            }
        }
        $rval = $this->data_for_relationship();
        $rval['datas'] = $datas;
        return view('manager.products.index', $rval);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.products.create',$this->data_for_relationship());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $path = $request->file('image')->store('products','public');
        $data = $request->all();
        $data['image'] = $path;
        $data['bestseller'] = $request->bestseller == 'true' ? true : false;
        Product::create($data);
        return redirect()->route('manager.products.index')->with('message','Đã thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('manager.products.show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $rval = $this->data_for_relationship();
        $rval['product'] = $product;
        return view('manager.products.edit',$rval);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);
        if($request->file('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;

            // xóa hình cũ
            if(Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        }
        $data['bestseller'] = $request->bestseller == 'true' ? true : false;
        $product->update($data);
        return redirect()->route('manager.products.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // xóa hình cũ
        if(Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return back()->with('message','Đã xóa thành công');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_for_relationship() {
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        $sizes = Size::all();

        return [
            'sub_categories' => $sub_categories,
            'brands' => $brands,
            'sizes' => $sizes
        ];
    }
}
