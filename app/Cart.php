<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    
 public function products(){
    	return $this->belongsTo('App\Product','product_id');
    }

    public function offers(){
    	return $this->belongsTo('App\Offer','product_id');
    }
}
