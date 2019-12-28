<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [];

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
        return $this->belongsToMany(Product::class)->withPivot('product_id','quantity', 'id');
    }

    public function getIvaAttribute($value){
        $total = $this->total;
        return $total * 0.19;
    }

    public function getTotalAttribute($value){
        $total = $this->products->sum('unit_value');
        return $total;
    }    

    
   
}
