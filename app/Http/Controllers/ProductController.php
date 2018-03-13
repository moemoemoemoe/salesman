<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_items()
    {
        return view('products.add_item');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_items_save(Request $r)
    {
            $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('name_item');
            $content_item= $r->input('content_item');
            $quantity = 0;
            $price_item = $r->input('price_item');
            $photo = $r->file('photo');

            $data = ['name_item' => $name_item,'content_item'=> $content_item,'photo' => $photo,'price_item' => $price_item];

            $rules = ['name_item' => 'required' ,'content_item' => 'required','photo'=> 'required','price_item' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $destination = 'upload/product';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);

                $product = new Product();
                $product->name = $name_item;
                $product->content = $content_item;
                $product->quantity = $quantity;
                $product->price = $price_item;
                $product->img_name = $photo_name;
                $product->image_url_original = config('my_url_product').$photo_name;
                $product->status = 0;
             
                $product->save();

return Redirect::route('show_item', $product->id);


            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_item($id)
    {
       $products= Product::findOrFail($id);
       return view('products.show_item',compact('products'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_item($id)
    {
         $products = Product::findOrFail($id);
     if($products->status == '0')
     {
       $products->status = '1';
       $products->save();
       return Redirect::Back()->with('success', 'This product is Published');
     }
     else{
      $products->status = '0';
      $products->save();
      return Redirect::Back()->with('success', 'This product is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_item($id)
    {
         $product = Product::findOrFail($id);
      $product->delete();
  
      return Redirect::route('add_items')->with('success' , 'Product was Deleted successfuly!!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_items()
    { 
        $products = Product::orderBy('id','DESC')->get();
        return view('products.all_items',compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_item_update(Request $r,$id)
    {
          $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('name_item');
            $content_item= $r->input('content_item');
            $quantity = $r->input('quantity');
            $price_item = $r->input('price_item');
            $photo = $r->file('photo');

            $data = ['name_item' => $name_item,'content_item'=> $content_item,'price_item' => $price_item,'quantity'=>$quantity];

            $rules = ['name_item' => 'required' ,'content_item' => 'required','price_item' => 'required','quantity'=>'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               if($r->hasFile('photo')){
            $destination = 'upload/product';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        }

                $product =Product::findOrFail($id);
                $product->name = $name_item;
                $product->content = $content_item;
                $product->quantity = $quantity;
                $product->price = $price_item;
if($r->hasFile('photo')){
            unlink('upload/product/'.$product->img_name);
             $product->img_name = $photo_name;
                $product->image_url_original = config('my_url_product').$photo_name;
        }
               

                $product->save();

return Redirect::back()->with('success', 'New Product successfuly Updated');

    }
}
}