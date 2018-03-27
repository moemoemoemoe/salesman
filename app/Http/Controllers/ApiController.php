<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SaleMan;
use App\Customer;
use App\SaletoCus;
use App\Offer;
use App\Order;
use App\Payment;
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
         $carts = Cart::orderBy('id','DESC')->where('inv_nummber',$id)->with('products')->with('offers')->get();
         return $carts;
        //
    }

    public function all_orders_sales($email)
    {
        $sales = SaleMan::select('id')->where('email',$email)->get();
         $orders = Order::orderBy('id','DESC')->where('sale_id',$sales[0]->id)->with('customer')->limit(20)->get();
         return $orders;
        //
    
}
public function payments($inv)
{

$payments = Payment::where('inv_id',$inv)->get();
return $payments;
}

public function pay_invoice($inv,$amount,$total)
{

    $payment = Payment::where('inv_id',$inv)->get();
    if(count($payment) == 0)
    {
        $add_payment = new Payment();
        $add_payment->inv_id = $inv;
        $add_payment->amount = $amount;
        $add_payment->total =  $total;
        $add_payment->rest =  $total - $amount;
        $add_payment->the_date = date('j-n-Y');

try {
    $add_payment->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}



    }
    else
    {

    $payment_old = Payment::where('inv_id',$inv)->orderBy('id','DESC')->limit(1)->get();
if($payment_old[0]->rest - $amount == 0)
{

    $order=Order::where('inv_nummber',$inv)->get();
    $order_stat = Order::findOrFail($order[0]->id);
    $order_stat->status = 4;
    $order_stat->save();

        $add_payment = new Payment();
        $add_payment->inv_id = $inv;
        $add_payment->amount = $amount;
        $add_payment->total =  $total;
        $add_payment->rest =  $payment_old[0]->rest - $amount;
        $add_payment->the_date = date('j-n-Y');

try {
    $add_payment->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}


}
elseif ($payment_old[0]->rest - $amount < 0) {
        return "[{".'"status":'.'"Please check the invoice report,the paymen is Bigger than rest!! "'."}]"; 

}
else
{


        $add_payment = new Payment();
        $add_payment->inv_id = $inv;
        $add_payment->amount = $amount;
        $add_payment->total =  $total;
        $add_payment->rest =  $payment_old[0]->rest - $amount;
        $add_payment->the_date = date('j-n-Y');

try {
    $add_payment->save();
    return "[{".'"status":'.'"Uploaded Successfully"'."}]"; 
    
} catch (Exception $e) {

    return "[{".'"status":'.'"Error on Save please Try again"'."}]";
}
}


    


    }
}

}
