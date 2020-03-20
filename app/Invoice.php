<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{

    protected $fillable = [

        'id',
        'state',
        'expedition_date',
        'expiration_date',
        'total',
        'iva',
        'subtotal',
        'seller_id',
        'client_id',
    ];

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * @return HasMany
     */
    public function invoice_products()
    {
        return $this->hasMany(Invoice_product::class);
    }

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('product_id', 'quantity', 'id');
    }

    public function controlReport()
    {
        return $this->belongsToMany(ControlReport::class, 'control_report_invoices');
    }

    /**
     * @param
     * @return float|int
     */
    public function getSubTotalAttribute()
    {
        $subTotal = 0;
        foreach ($this->products as $product) {
            $subTotal += $product->pivot->quantity * $product->unit_value;
        }

        return $subTotal;
    }

    /**
     * @param
     * @return float
     */
    public function getIvaAttribute()
    {
        return $this->subTotal * 0.19;
    }

    /**
     * @param
     * @return mixed
     */
    public function getTotalAttribute()
    {
        return $this->subTotal + $this->iva;
    }

    /**
     * @param $query
     * @param $state
     * @return mixed
     */
    public function scopeState($query, $state)
    {
        if (trim($state) != "") {
            return $query->where('state', "$state");
        }
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeId($query, $id)
    {
        if (trim($id) != "") {
            return $query->where('id', "$id");
        }
    }

    /**
     * @param $query
     * @param $seller_id
     * @return mixed
     */
    public function scopeSeller($query, $seller_id)
    {
        if (trim($seller_id) != "") {
            return $query->where('seller_id', "$seller_id");
        }
    }

    /**
     * @param $query
     * @param $client_id
     * @return mixed
     */
    public function scopeClient($query, $client_id)
    {
        if (trim($client_id) != "") {
            return $query->where('client_id', "$client_id");
        }
    }

    /**
     * @param $query
     * @param $dateStart
     * @param $dateFinish
     * @return mixed
     */
    public function scopeDates($query, $dateStart, $dateFinish)
    {
        if ($dateStart && $dateFinish) {
            return $query->whereBetween('expedition_date', ["${dateStart}", "${dateFinish}"]);
        }
    }
}
