<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlReport extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'status',
        'requestId',
        'processUrl',
        'invoice_id'
    ];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'control_report_invoices');
    }
}
