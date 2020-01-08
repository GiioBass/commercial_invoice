<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [

        'id',
        'state',
        'expedition_date',
        'expiration_date',
        'subtotal',
        'iva',
        'total',
        'seller_id' ,
        'client_id',
    ];
    
    public function client(){
        return $this->belongsTo(Client::class);
        
    }
    public function seller(){
        return $this->belongsTo(Seller::class);
        
    }
    
    
    
    public function invoice_products(){
        return $this->hasMany(Invoice_product::class);
    }
    

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('product_id','quantity', 'id');
    }

    public function getSubTotalAttribute($value){
       
        $subTotal = 0;
        foreach ($this->products as $product) {
           $subTotal += $product->pivot->quantity * $product->unit_value;
        }
        
        return $subTotal;
        
    }
    
    public function getIvaAttribute($value){
        $iva =  $this->subTotal * 0.19;
        return $iva;
    }    
    
    public function getTotalAttribute($value){
        $total = $this->subTotal + $this->iva;
        return $total;
    }
    
}
