<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_upfdate';

   

}
