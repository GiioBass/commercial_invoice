<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'email',
        'document_type_id',
    ];

    /**
     * @return HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
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
