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
 
        $carts = Order::orderBy('inv_nummber','DESC')->where('delivery_date','=',date('j-n-Y'))->with('customer')->with('sales')->paginate(20);
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
        $carts = Cart::orderBy('id','DESC')->where('inv_nummber',$id)->where('type',0)->with('products')->get();
        $total_inv =0;
        for($i=0 ;$i<count($carts) ; $i++)
       {
$total_inv = $total_inv  + ($carts[$i]->qty * $carts[$i]->products->price);

       }

        $carts_offers = Cart::orderBy('id','DESC')->where('inv_nummber',$id)->where('type',1)->with('offers')->get();
        

        $total_inv_offer =0;
        for($j=0 ;$j<count($carts_offers) ; $j++)
       {
$total_inv_offer = $total_inv_offer  + ($carts_offers[$j]->qty * $carts_offers[$j]->offers->price);

       }
      // return $total_inv_offer;



       return view('order.order_detail',compact('carts','total_inv','carts_offers','total_inv_offer'));
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
