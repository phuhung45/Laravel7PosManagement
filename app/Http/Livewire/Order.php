<?php

namespace App\Http\Livewire;

use App\Cart;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Livewire\Component;

class Order extends Component
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $value = $request->session()->get('key');

        //
    }
    public function __construct()
    {
        $this->productInCart = Cart::orderBy('id',"DESC")->get();
        // dump($this->productInCart);die;
    }
    public $orders, $products = [], $product_code, $message = '', $productInCart;

    public $pay_money = '', $balance = '';

    public function count()
    {
        $this->products = Product::all();
        $this->productInCart = Cart::all();
    }

    public function InsertoCard()
    {
        $countProduct = Product::where('id', $this->product_code)->first();

        if (!$countProduct) {
            return $this->message = 'không tìm thấy sản phẩm';
        }

        $countCartProduct = Cart::where('product_id', $this->product_code)->count();

        if ($countCartProduct > 0) {
            return $this->message = 'sản phẩm ' . $countProduct->product_name . ' đã có trong giỏ hàng, hãy kiểm tra lại số lượng ' ;
        }

        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();

        $this->productInCart->prepend($add_to_cart);
        $this->product_code = '';
        return $this->message = 'Thêm sản phẩm thành công';
        // dd($countProduct);
    }

    public function IncrementQty($cartID){
        $carts = Cart::where('id', $cartID)->first();
        // DB::table('carts')->where('id', $cartID)->increment('product_qty');
        $carts->increment('product_qty');
        $updatePrice = $carts->product_qty * $carts->product->price;
        // DB::table('carts')->where('id', $cartID)->update(['product_price' => $updatePrice]);
        $carts->update(['product_price' => $updatePrice]);
        $this->count();
    }

    public function DecrementQty($cartID){
        $carts = Cart::find($cartID);
        if ($carts->product_qty == 1) {
            return session()->flash('info', 'Sản phẩm' . $carts->product->product_name. ' Số lượng không thể thấp hơn 1. Thêm số lượng hoặc xóa sản phẩm khỏi hóa đơn');
        }
        $carts->decrement('product_qty');
        $updatePrice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->count();
    }

    public function removeProduct($cartID){
        $deleteCart = Cart::find($cartID);
        $deleteCart->delete();
        if($this->pay_money != '') {

        }

        session()->flash('success', 'đã xóa sản phẩm khỏi hóa đơn.');
        $this->productInCart = $this->productInCart->except($cartID);
    }

    public function render()
    {
        if ($this->pay_money != '') {
        $totalAmount = $this->pay_money - $this->productInCart->sum('product_price');
        var_dump($this->totalAmount);
        $this->balance = $totalAmount;
        }
        return view('Livewire.order');
    }
}

?>
