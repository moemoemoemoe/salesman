<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
      public function customer(){
    	return $this->belongsTo('App\Customer','customer_id');
    }
      public function sales(){
    	return $this->belongsTo('App\SaleMan','sale_id');
    }
}
