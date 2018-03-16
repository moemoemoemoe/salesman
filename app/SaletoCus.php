<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaletoCus extends Model
{
     public function customer(){
    	return $this->belongsTo('App\Customer','customers_id');
    }
}
