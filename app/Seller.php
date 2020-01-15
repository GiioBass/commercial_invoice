<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);

    }

    public function scopeId($query, $id)
    {
        if (trim($id) != "") {
            return $query->where('id', "$id");
        }

    }
}
