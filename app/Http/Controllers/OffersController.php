<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Offer;
use Redirect;
use Validator;
class OffersController extends Controller
{
    /**
    use 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offers_index()
    {
        $products = Product::orderBy('id','DESC')->where('status',1)->get();
        return view('offers.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offers_index_save(Request $r)
    {
          $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('sales_id');
            $content_item= $r->input('content_item');
            $price_item = $r->input('price_item');
            $photo = $r->file('photo');

            $data = ['name_item' => $name_item,'content_item'=> $content_item,'photo' => $photo,'price_item' => $price_item];

            $rules = ['name_item' => 'required' ,'content_item' => 'required','photo'=> 'required','price_item' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $destination = 'upload/offer';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);

                $product = new Offer();
                 $product->product_id = $name_item;

                $product->title = $content_item;
                
                $product->price = $price_item;
                $product->img_name = $photo_name;
                $product->image_url_original = config('app.my_url_offer').$photo_name;
                $product->status = 0;
             
                $product->save();

      return Redirect::Back()->with('success', 'This Offer is Uploaded');


    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_offers()
    {
        $products = Product::orderBy('id','DESC')->with('offer')->get();


        return view('offers.manage_offers',compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_offer($id)
    {
         $offer = Offer::findOrFail($id);
      $offer->delete();
        return Redirect::Back()->with('success', 'This Offer is Deleted successfuly');

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
