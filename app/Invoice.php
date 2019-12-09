<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
        
    }
    public function seller(){
        return $this->belongsTo(Seller::class);
        
    }
    
    
    /*
    public function invoice_products(){
        return $this->hasMany(Invoice_product::class);
    }
    */

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    
    public function getUnitValueAttribute(Invoice $invoice){
        $total = 0;

        foreach ($invoice->products as $product) {
            $total += $product->unit_value;
            return $total;
            dd($total);
        }
    }
   
}
