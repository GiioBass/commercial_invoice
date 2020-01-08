<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    protected $fillable = [
        'id',
        'name',
        'description',
        'unit_value',
    ];
  


   public function invoices(){
       return $this->belongsToMany(Invoice::class)->withPivot(['invoice_id', 'quantity', 'id']);
   }
   
}
