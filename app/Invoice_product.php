<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice_product extends Model
{
    protected $table = 'invoice_product';

    protected $fillable = [
        'quantity',
        'invoice_id',
        'product_id',
    ];

    /**
     * @return BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
