<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Hiển thị giỏ hàng
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        return view('store.orders.cart');
    }
    /**
     * Hiển thị thanh toán
     *
     * @param  int  $id
     * @return View
     */
    public function checkout()
    {
        return view('store.orders.checkout');
    }
}
