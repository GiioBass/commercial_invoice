<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_product extends Model
{
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
