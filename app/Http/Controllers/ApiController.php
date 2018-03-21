<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SaleMan;
use App\Customer;
use App\SaletoCus;
use App\Offer;
use App\Order;
use App\Cart;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_products()
    {
        $products = Product::OrderBy('id','DESC')->where('status',1)->get();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_customers($email)
    {
        $saleman = SaleMan::select('id')->where('email',$email)->get();
       $custumers_attashed = SaletoCus::where('sale_men_id',$saleman[0]->id)->with('customer')->get();
       return $custumers_attashed;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_all_Offers()
    {
        $offers = Offer::select('id','image_url_original')->orderBy('id','DESC')->where('status',0)->get();

        return '{
  "offers":'.$offers.'}';
    }
  public function spec_offer($id)
    {
        $offers = Offer::orderBy('id','DESC')->where('id',$id)->where('status',0)->get();

        
  return $offers;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_invoices($email)
    {
        $sales = SaleMan::select('id')->where('email',$email)->get();

        $orders = Order::where('sale_id',$sales[0]->id)->with('customer')->where('delivery_date','=',date('j-n-Y'))->get();
    return $orders;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_customers($email)
    {
        $sales = SaleMan::select('id')->where('email',$email)->get();
        $customer = SaletoCus::orderBy('id','DESC')->where('sale_men_id',$sales[0]->id)->with('customer')->get();
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_invoice($id)
    {
        $invoices = Order::OrderBy('delivery_date','DESC')->where('customer_id',$id)->limit(10)->get();
        return $invoices;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_invoice($id)
    {
         $carts = Cart::orderBy('id','DESC')->where('inv_nummber',$id)->with('products')->get();
         return $carts;
        //
    }
}
