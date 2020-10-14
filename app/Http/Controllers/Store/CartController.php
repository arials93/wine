<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Model\Product;
use App\Model\Bill;
use App\Model\BillDetail;
use Carbon\Carbon;
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
    private function _check_stock_before_checkout($cart) {
        $pass_check = True;
        $out_of_stock_list = [];
        foreach($cart as $item) {
            $product = Product::find($item->associatedModel->id);
            if($item->quantity > $product->instock) {
                $pass_check = False;
                array_push($out_of_stock_list, $item->name);
            }
        }

        return ['pass' => $pass_check, 'list' => $out_of_stock_list];
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
        
        $cart = \Cart::getContent();
        $check_stock = $this->_check_stock_before_checkout($cart);
        if(!$check_stock['pass']) {
            $out_of_stock_array_to_string = implode(", ", $check_stock['list']);
            return redirect()->route('store.cart')->with(
                'stock_message', "$out_of_stock_array_to_string không đủ số lượng trong kho vui lòng chỉnh sửa giỏ hàng"); 
        }
        return view('store.orders.checkout');
    }

    public function add(Request $request) {
        $quantity = $request->quantity ?? 1;
        $product = Product::find($request->product_id);
        if(($product->instock - $quantity) < 0) {
            return $this->_return_out_of_stock($quantity, $product->instock);
        }

        $in_cart = \Cart::get("product_$product->id");
        // + dồn số lượn sản phẩm khi thêm vào giỏ hàng, nếu số lương + dồn > hơn instock thì k cho phép thêm
        if($in_cart && $product->instock - ($in_cart->quantity + $quantity) < 0) {
            return $this->_return_out_of_stock($in_cart->quantity + $quantity, $product->instock);
        }

        $cart_item = array(
            'id' => "product_$product->id",
            'name' => $product->name,
            'price' => $product->price - ($product->price * $product->sale / 100),
            'quantity' => $quantity,
            'associatedModel' => $product
        );
        \Cart::add($cart_item);

        return $this->_return_cart_content();
    }

    public function update(Request $request) {
        $in_cart = \Cart::get($request->cart_id);
        $product = Product::find($in_cart->associatedModel->id);
        if(($product->instock - $request->quantity) < 0) {
            return $this->_return_out_of_stock($request->quantity, $product->instock, $in_cart->quantity);
        }

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

    private function _return_out_of_stock($quantity, $instock, $old_quantity=0) {
        return response()->json(
            [
                "message" => "Sản phẩm này không đủ $quantity sản phầm (còn lại: $instock)",
                "error_code" => "OUT_OF_STOCK",
                'old_quantity' => $old_quantity,
            ], 400);
    }

    public function order(OrderRequest $request)
    {
        $cart = \Cart::getContent();
        $data = $request->all();
        $data['total'] = \Cart::getTotal();
        $data['bill_code'] = Carbon::now()->format('Y-m-d\TH:i:s.uP');
        if(Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }
        $bill = Bill::create($data);
        foreach($cart as $item) {
            BillDetail::create([
                'quantity' => $item->quantity,
                'price' => $item->price,
                'sale' => $item->associatedModel->sale,
                'total' => $item->quantity * $item->price,
                'bill_id' => $bill->id,
                'product_id' => $item->associatedModel->id,
            ]);
        }
        \Cart::clear();
        return redirect()->route('store.order-complete');
    }

    public function order_complete()
    {
        return view('store.orders.order-complete');
    }
}
