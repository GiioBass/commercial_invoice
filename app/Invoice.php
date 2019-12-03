<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
        
    }

    public function invoice_products(){
        return $this->hasMany(Invoice_product::class);
    }

    
   
}
