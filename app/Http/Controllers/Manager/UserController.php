<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 1;
        //Lọc user là quản trị (admin), chỉ dành cho super admin
        if($request->admin)
        {
            //Lọc user theo tên, điện thoại và email
           if($request->search)
           {
               $search = $request->search;
               //Hiển thị user trừ bản thân
               $datas = User::withTrashed()->where('id', '!=', auth()->user()->id)
                            ->where('is_admin',1)
                            ->where(function ($q) use ($search) {
                                $q->where('name','LIKE','%'.$search.'%')
                                ->orWhere('phone','LIKE','%'.$search.'%')
                                ->orWhere('email', 'LIKE', '%'.$search.'%');
                            })->paginate($paginate);
           }
           else
                $datas = User::withTrashed()->where('id', '!=', auth()->user()->id)
                            ->where('is_admin',1)
                            ->paginate($paginate);
        }
        else
        {
            //Lọc user là khách hàng theo tên, điện thoại và email
            if($request->search)
           {
               $search = $request->search;
               $datas = User::withTrashed()->where('id', '!=', auth()->user()->id)
                            ->where('is_admin',0)
                            ->where(function ($q) use ($search) {
                                $q->where('name','LIKE','%'.$search.'%')
                                ->orWhere('phone','LIKE','%'.$search.'%')
                                ->orWhere('email', 'LIKE', '%'.$search.'%');
                            })->paginate($paginate);
           }
           //Lọc theo khách hàng
            else
                $datas = User::withTrashed()->where('id', '!=', auth()->user()->id)
                            ->where('is_admin',0)
                            ->paginate($paginate);
        }
        // $datas = User::where('id', '!=', auth()->user()->id)->paginate(10);
        return view('manager.users.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Product::findOrFail($id);
        // xóa hình cũ
        if(Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
        $product->delete();
        return back()->with('message','Đã xóa thành công');
    }

    public function disable($id) {
        
        $user = User::onlyTrashed()->where('id', $id)->first();
        if(!$user) {
            $user = User::findOrFail($id);
            $user->delete();
        } else {
            $user->restore();
        }

        $msg = $user->deleted_at ? 'kích hoạt' : 'hủy';

        return back()->with('message',"Đã $msg tài khoản thành công");
    }
}
