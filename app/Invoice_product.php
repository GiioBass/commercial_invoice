<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_product extends Model
{
    protected $table = 'invoice_product';

    protected $fillable = [
        'quantity',
        'invoice_id',
        'product_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);

    }
}
