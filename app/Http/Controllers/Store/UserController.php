<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Bill;
use App\Model\BillDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $bills = Bill::where('user_id',auth()->user()->id)->with('bill_detais')->get();
        return view('store.users.info-user',['bills' => $bills]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // chính nó được chỉnh sửa thông tin cá nhân của mình
        if(auth()->user()) {
            // những field không cần update
            // loại bỏ email vì email k thể update
            // loại bỏ password nếu k update password
            $except_field = ['email', 're-password', 'password'];
            $data = $request->except($except_field);
            // nếu có password được truyền lên server thì update luôn password
            if($request->password) {
                // loại bỏ password khỏi danh sách loại trừ
                unset($except_field['password']);
                $data = $request->except($except_field);
                // mã hóa password trước khi update
                $data['password'] = Hash::make($request->password);
            }
            $user = User::findorFail(auth()->user()->id);
            //Nếu k có thay đổi hình thì vẫn giữ hình cũ
            if($request->file('image')) {
                $path = $request->file('image')->store('users', 'public');
                $data['image'] = $path;
    
                // xóa hình cũ
                if(Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }
            }
            // dd($data['image']);
            // gender from string to bool
            $data['gender'] = $data['gender'] == 'true' ? true : false;
            $user->update($data);
            return redirect()->route('store.users.info');
        }
        //trả về trang 404
        abort(404); 
    }

}
