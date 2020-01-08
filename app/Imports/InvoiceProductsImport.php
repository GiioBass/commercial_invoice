<?php

namespace App\Imports;

use App\Invoice_product;
use Maatwebsite\Excel\Concerns\ToModel;

class InvoiceProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice_product([
            'quantity' => $row[0],
            'invoice_id' => $row[1],
            'product_id' => $row[2]
        ]);
    }
}
