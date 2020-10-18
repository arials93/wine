<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bill;

class DashboardController extends Controller
{
    public function index()
    {
        $data['new_order'] = Bill::where('confirm', false)->count();
        $data['confirmed'] = Bill::where('confirm', true)->whereNull('ship_date')->whereNull('receive_date')->count();
        $data['delivery'] = Bill::whereNotNull('ship_date')->whereNull('receive_date')->count();
        $data['completed'] = Bill::whereNotNull('receive_date')->count();
        return view('manager.dashboard', $data);
    }
}
