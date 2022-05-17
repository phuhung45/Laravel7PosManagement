<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Order;
use App\Product;
use App\Cart;
use App\Order_Detail;
use App\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();

        $lastID = Order_Detail::max('order_id');
        $order_receipt = Order_Detail::where('order_id', $lastID)->get();

        return view('orders.index', [
            'products' => $products,
            'orders' => $orders,
            'order_receipt' => $order_receipt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request->all());
        // return $request->all();
        DB::transaction(function () use ($request){
            $orders = new Order;
            $orders->name = $request->customer_name;
            $orders->phone = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;

        // order detail modal
        for ($product_id = 0; $product_id < sizeof($request->product_id); $product_id++) {
            // dd($request);
        $order_details = new Order_Detail;
        $order_details->order_id = $order_id;
        $order_details->product_id = $request->product_id[$product_id];
        $order_details->quantity = $request->quantity[$product_id];
        $order_details->unitprice = $request->price[$product_id];
        $order_details->discount = $request->discount[$product_id];
        $order_details->amount = $request->total_amount[$product_id];
        $order_details->save();
        }
        // dd($order_details);
        // tranactions Modal
        $transaction = new Transaction();
        $transaction->order_id = $order_id;
        $transaction->user_id = auth()->user()->id;
        $transaction->balance = $request->balance;
        $transaction->paid_amount = $request->paid_amount;
        $transaction->payment_method = $request->payment_method;
        $transaction->transac_amount = $order_details->amount;
        $transaction->transac_date = date('Y-m-d');
        $transaction->save();

        Cart::truncate();
        // dd($transaction);

        $products = Product::all();
        $order_details = Order_Detail::where('order_id', $order_id)->get();
        $orderedBy = Order::where('id', $order_id)->get();

        return view('orders.index', [
            'products' => $products,
            'order_details' => $order_details,
            'customer_orders' => $orderedBy
        ]);

    });

            return back()->with("Thêm hóa đơn thất bại. kiểm tra đầu vào của bạn !");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
