<?php

namespace App\Imports;

use App\Invoice_product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SecondSheetImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            Invoice_product::create([
                'quantity' => $row[0],
                'invoice_id' => $row[1],
                'product_id' => $row[2],

            ]);
        }
    }

}
