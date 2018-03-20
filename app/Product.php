<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      public function offer()
    {

    	return $this->hasMany('App\Offer','product_id');
    }

      public function cart()
    {

    	return $this->hasMany('App\Cart','product_id');
    }
    
}
