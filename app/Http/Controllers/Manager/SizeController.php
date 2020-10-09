<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Size;
use App\Http\Requests\StoreSize;
use App\Http\Requests\UpdateSize;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Size::orderbyDesc('created_at')->get();
        return view('manager.others.sizes.index',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.others.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSize $request)
    {
        $size = $request->size;
        //Lấy tất cả size trong bảng sizes kể cả size đã xóa
        $data = Size::withTrashed()->where('size',$size)->first();
        //Trường hợp size nhập không tồn tại thì tạo mới
        if(is_null($data))
        {
            $data = Size::create($request->all());
        }
        else
        {
            //Nếu size nhập vào cùng dữ liệu và nằm trong soft delete thì khôi phục dữ liệu cũ
            if($size == $data->size && $data->trashed())
            {
                $data->restore();
            }
            //Ngược lại nếu size nhập vào đã tồn tại thì báo lỗi
            else{
                $validator = Validator::make(
                    $request->all(),
                    [
                        'size' => 'unique:sizes,size',
                    ],
                    [
                        'size.unique' => 'Dung tích này đã tồn tại.',
                    ]
                );
                //Trả về trang trước với lỗi Unique
                if ($validator->fails()) {
                    return redirect(url()->previous())->withErrors($validator)->withInput();
                }
            }
        }     
        return redirect()->route('manager.others.sizes.index')->with('message','Đã thêm mới thành công.');       
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
        $size = Size::find($id);
        return view('manager.others.sizes.edit',['size' => $size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSize $request, $id)
    {
        $data = Size::find($id)->update($request->all());
        return redirect()->route('manager.others.sizes.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Size::find($id)->delete();
        return back()->with('message','Đã xóa thành công');
    }
}
