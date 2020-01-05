<?php

namespace App\Imports;

use App\Seller;
use Maatwebsite\Excel\Concerns\ToModel;

class SellersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Seller([
            'id' => $row[0],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'email' => $row[3],
            'phone_number' => $row[4],
        ]);
    }
}
