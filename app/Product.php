<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /*
   public function invoice_products(){
       return $this->hasMany(Invoice_product::class);
   }
  */


   public function invoices(){
       return $this->belongsToMany(Invoice::class);
   }
   
}
