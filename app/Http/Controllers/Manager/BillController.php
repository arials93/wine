<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bill;

class BillController extends Controller
{
    public function index($tab = null, Request $request) {
        $paginate = 10;
        if ($tab && !$request->search) {
            if($tab == 'new') {
                $orders = Bill::where('confirm', false)->where('is_cancel', false)->orderByDesc('id')->paginate($paginate);
            }
            
            if($tab == 'confirmed') {
                $orders = Bill::where('confirm', true)
                                ->where('is_cancel', false)
                                 ->whereNull('ship_date')
                                 ->whereNull('receive_date')
                                 ->orderByDesc('id')
                                 ->paginate($paginate);
            }
    
            if($tab == 'delivery') {
                $orders = Bill::whereNotNull('ship_date')
                                ->where('is_cancel', false)
                                 ->whereNull('receive_date')
                                 ->orderByDesc('id')
                                 ->paginate($paginate);
            }
    
            if($tab == 'received') {
                $orders = Bill::whereNotNull('receive_date')->where('is_cancel', false)->orderByDesc('id')->paginate($paginate);
            }

            if($tab == 'cancel') {
                $orders = Bill::where('is_cancel', true)->orderByDesc('id')->paginate($paginate);
            }
        } else {
            $orders = Bill::where(function($query) use ($request) {
                $query->where('bill_name', 'LIKE', '%'.$request->search.'%')
                      ->orWhere('bill_phone', 'LIKE', '%'.$request->search.'%')
                      ->orWhere('email', 'LIKE', '%'.$request->search.'%');
            })->paginate($paginate);
        }
        return view('manager.bills.index', ['data' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Bill::findOrFail($id);
        // dd($order->bill_detais);
        return view('manager.bills.edit', ['data' => $order]);
    }

    public function confirm($id)
    {
        $order = Bill::findOrFail($id);
        $order->confirm = true;
        $order->save();

        
        return redirect(url()->previous())->with('msg', 'Đã xác nhận đơn hàng thành công');
    }

    public function delivery($id)
    {
        $order = Bill::findOrFail($id);
        $order->ship_date = \Carbon\Carbon::now();
        $order->save();

        
        return redirect(url()->previous())->with('msg', 'Đã xác lập ngày giao đơn hàng thành công');
    }

    public function received($id, Request $request)
    {
        $order = Bill::findOrFail($id);
        $receive_date = $request->receive_date ?? \Carbon\Carbon::now();
        $order->receive_date = $receive_date;
        $order->save();

        
        return redirect(url()->previous())->with('msg', 'Đã xác nhận ngày nhận hàng thành công');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $orders = Bill::findOrFail($id);
        // $orders->delete();
        
        // return redirect(url()->previous())->with('msg', 'Đã xóa đơn hàng thành công');
    }


    /**
     * Hủy đơn hàng
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $orders = Bill::findOrFail($id);
        $orders->is_cancel = true;
        $orders->save();
        
        return redirect(url()->previous())->with('msg', 'Đã hủy đơn hàng thành công');
    }
}
