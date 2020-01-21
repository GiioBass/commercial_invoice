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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot(['invoice_id', 'quantity', 'id']);
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

}
