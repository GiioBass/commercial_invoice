<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'document_types';
    public $timestamps = false;

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
