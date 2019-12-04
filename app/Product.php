<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function invoice_products(){
       return $this->belongsTo(Invoice_product::class);
   }
   
}
