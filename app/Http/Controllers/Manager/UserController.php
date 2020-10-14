<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $status = $request->status;
        $search = $request->search;
        //Lọc user là quản trị (admin), chỉ dành cho super admin khi có requets->admin = 1
        $datas = User::where('id', '!=', auth()->user()->id)->where('is_admin', $request->admin ? 1 : 0);

        //Lọc trạng thái
        switch($status) {
            //Lấy tất cả người dùng
            case 0:
                $datas->withTrashed();
                break;
            //Chỉ lấy người dùng đã bị hủy
            case 2:
                $datas->onlyTrashed();
                break;
            //Lấy người dùng đang kích hoạt
            default:
                break;
        }
        //Lọc theo tên, email và số điện thoại
        if($request->search) {
            $datas->where(function ($q) use ($search) {
                $q->where('name','LIKE','%'.$search.'%')
                ->orWhere('phone','LIKE','%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            });
        }
        return view('manager.users.index', ['datas' => $datas->paginate($paginate)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('manager.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->image ? $request->file('image')->store('users','public') : null; 
        $data = $request->all();
        $data['image'] = $path;
        // mã hóa password trước khi lưu 
        $data['password'] = Hash::make($request->password);
        $data['gender'] = $data['gender'] == 'true' ? true : false;
        // is_admin from string to bool
        $data['is_admin'] = $data['is_admin'] == 'true' ? true : false;
        $user = User::create($data);
        return redirect()->route('manager.users.index')->with('msg', 'Đã tạo tài khoản thành công');
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
        // 
    }
    
    public function disable($id) {
        
        $user = User::onlyTrashed()->where('id', $id)->first();
        if(!$user) {
            $user = User::findOrFail($id);
            $user->delete();
        } else {
            $user->restore();
        }

        $msg = $user->deleted_at ? 'hủy' : 'kích hoạt';

        return back()->with('message',"Đã $msg tài khoản thành công.");
    }
}
