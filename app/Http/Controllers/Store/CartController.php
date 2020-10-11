<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
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
        if(\Cart::isEmpty()) {
            // nếu giỏ hàng không có gì thì sẽ không được thanh toán
            abort(404);
        }
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

    public function order(OrderRequest $request)
    {
        // $data = $request->all();
        // $data['total'] = Cart::getTotal();
        // if(Auth::check()) {
        //     $data['user_id'] = Auth::user()->id;
        // }
        // $order = Order::create($data);
        // $cart = Cart::getContent();
        // foreach($cart as $item) {
        //     DetailOrder::create([
        //         'quality' => $item->quantity,
        //         'price' => $item->price,
        //         'sale' => $item->associatedModel->sale,
        //         'total' => $item->quantity * $item->price,
        //         'order_id' => $order->id,
        //         'product_id' => $item->associatedModel->id,
        //     ]);
        // }
        // \Cart::clear();
        // return redirect()->route('store.cart.order-complete');
    }

    public function order_complete()
    {
        // return view('store.order_complete');
    }
}
