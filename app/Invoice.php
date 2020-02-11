<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [

        'id',
        'code',
        'state',
        'expedition_date',
        'expiration_date',
        'subtotal',
        'iva',
        'total',
        'seller_id',
        'client_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoice_products()
    {
        return $this->hasMany(Invoice_product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
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
     * @param $value
     * @return float|int
     */
    public function getSubTotalAttribute($value)
    {
        $subTotal = 0;
        foreach ($this->products as $product) {
            $subTotal += $product->pivot->quantity * $product->unit_value;
        }

        return $subTotal;
    }

    /**
     * @param $value
     * @return float
     */
    public function getIvaAttribute($value)
    {
        $iva = $this->subTotal * 0.19;
        return $iva;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getTotalAttribute($value)
    {
        $total = $this->subTotal + $this->iva;
        return $total;
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
    public function scopeCode($query, $code)
    {
        if (trim($code) != "") {
            return $query->where('code', "$code");
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
            return $query->whereBetween('expedition_date', ["$dateStart", "$dateFinish"]);
        }
    }
}
