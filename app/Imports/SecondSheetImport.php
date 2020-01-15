<?php

namespace App\Imports;

use App\Invoice_product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SecondSheetImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            Invoice_product::create([
                'quantity' => $row['quantity'],
                'invoice_id' => $row['invoice_id'],
                'product_id' => $row['product_id'],

            ]);
        }
    }

}
