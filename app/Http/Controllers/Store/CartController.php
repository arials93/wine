<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Auth;

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

    public function add(Request $request) {
        $product = Product::find($request->product_id);
        \Cart::add(array(
            'id' => "product_$product->id",
            'name' => $product->name,
            'price' => $product->price - ($product->price * $product->sale / 100),
            'quantity' => $request->quantity ?? 1,
            'associatedModel' => $product
        ));

        return $this->_return_cart_content();
    }

    public function update(Request $request) {
        \Cart::update($request->cart_id,[
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ]);

        return $this->_return_cart_content();
    }

    public function delete(Request $request) {
        \Cart::remove($request->cart_id);
        return $this->_return_cart_content();
    }

    public function get_cart() {
        return $this->_return_cart_content();
    }

    private function _return_cart_content() {
        return response()->json(["data" => \Cart::getContent(), "total" => \Cart::getTotal()], 200);
    }
}
