<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bill;
use Illuminate\Support\Facades\Mail;

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
        return view('manager.bills.edit', ['data' => $order]);
    }

    public function confirm($id)
    {
        $order = Bill::findOrFail($id);
        $order->confirm = true;
        $order->save();

        Mail::to($order->email)->send(new \App\Mail\OrderMail(
            $order,
            'Xác nhận đơn hàng',
            'Đơn hàng của bạn đã được duyệt',
            '<p>Đơn hàng của bạn đã được cửa hàng tiếp nhận.</p>
             <p>Vui lòng theo dõi E-mail để biết thời gian giao hàng.</p>'
        ));

        
        return redirect(url()->previous())->with('msg', 'Đã xác nhận đơn hàng thành công');
    }

    public function delivery($id)
    {
        $order = Bill::findOrFail($id);
        $order->ship_date = \Carbon\Carbon::now();
        $order->save();

        Mail::to($order->email)->send(new \App\Mail\OrderMail(
            $order,
            'Xác nhận ngày giao hàng',
            'Đơn hàng của bạn đang được giao',
            '<p>Đơn hàng của bạn đã được chuyển đến bộ phận giao hàng.</p>
             <p>Chúng tôi sẽ liên lạc với bạn hoặc người nhận khi đơn hàng được giao tới.</p>'
        ));

        
        return redirect(url()->previous())->with('msg', 'Đã xác lập ngày giao đơn hàng thành công');
    }

    public function received($id, Request $request)
    {
        $order = Bill::findOrFail($id);
        $receive_date = $request->receive_date ?? \Carbon\Carbon::now();
        if($receive_date >= $order->ship_date) {
            $order->receive_date = $receive_date;
            $order->save();
    
            Mail::to($order->email)->send(new \App\Mail\OrderMail(
                $order,
                'Xác nhận ngày nhận hàng',
                'Đơn hàng của bạn đang được giao đến',
                ''
            ));
    
            
            return redirect(url()->previous())->with('msg', 'Đã xác nhận ngày nhận hàng thành công');
        }

        return redirect(url()->previous())->with('msg-error', 'Vui lòng chọn ngày nhận hàng lớn hơn hoặc bằng ngày giao hàng');

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
