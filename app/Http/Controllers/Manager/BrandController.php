<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Model\Country;
use App\Http\Requests\StoreBrand;
use App\Http\Requests\UpdateBrand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 5;
        $countries = Country::all();
       
        if($request->search && $request->country == 0)
        {
            $datas = Brand::where('name','LIKE','%'.$request->search.'%')->with('country')->paginate($paginate);
        }
        elseif (is_null($request->search) && $request->country) {
            $datas = Brand::where('country_id',$request->country)->with('country')->paginate($paginate);
        }
        elseif ($request->search && $request->country) {
            $datas = Brand::where('name','LIKE','%'.$request->search.'%')
                            ->where('country_id', $request->country)->with('country')->paginate($paginate);
        }
        else{
            $datas = Brand::orderbyDesc('created_at')->with('country')->paginate($paginate);
        }  
        return view('manager.others.brands.index',['datas' => $datas,'countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('manager.others.brands.create',['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrand $request)
    {
        $path = $request->file('image')->store('brands','public');
        $data = $request->all();
        $data['image'] = $path;
        Brand::create($data);
        return redirect()->route('manager.others.brands.index')->with('message','Đã thêm mới thành công');
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
        $brand = Brand::findOrFail($id);
        $countries = Country::all(); 
        return view('manager.others.brands.edit',['brand' => $brand,'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrand $request, $id)
    {
        $data = $request->all();
        $brand = Brand::findOrFail($id);
        if($request->file('image')) {
            $path = $request->file('image')->store('brands', 'public');
            $data['image'] = $path;

            // xóa hình cũ
            if(Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }
        }
        $brand->update($data);
        return redirect()->route('manager.others.brands.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        // xóa hình cũ
        if(Storage::disk('public')->exists($brand->image)) {
            Storage::disk('public')->delete($brand->image);
        }
        $brand->delete();
        return back()->with('message','Đã xóa thành công');
    }
}