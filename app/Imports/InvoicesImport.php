<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;

class InvoicesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'id' => $row[0],
            'state' => $row[1],
            'expedition_date' => $row[2],
            'expiration_date' => $row[3],
            'subtotal' => $row[4],
            'iva' => $row[5],
            'total' => $row[6],
            'created_at' => $row[7],
            'update_at' => $row[8],
            'seller_id' => $row[9],
            'client_id' => $row[10],


        ]);
    }
}
