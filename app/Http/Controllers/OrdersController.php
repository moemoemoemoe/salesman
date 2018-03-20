<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use paginate;
use App\Cart;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {

        $carts = Order::orderBy('inv_nummber','DESC')->where('delivery_date','=',date('Y-m-d'))->with('customer')->with('sales')->paginate(20);
      //  return $carts;
    return view('order.orders',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_orders($id)
    {
        $carts = Cart::orderBy('id','DESC')->where('inv_nummber',$id)->with('products')->get();
        $total_inv =0;
        for($i=0 ;$i<count($carts) ; $i++)
       {
$total_inv = $total_inv  + ($carts[$i]->qty * $carts[$i]->products->price);

       }
       // return $total_inv;



       return view('order.order_detail',compact('carts','total_inv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
