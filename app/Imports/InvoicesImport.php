<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InvoicesImport implements WithMultipleSheets, WithChunkReading
{

    public function sheets(): array
    {
        return [
            new FirstSheetImport(),
            new SecondSheetImport(),

        ];
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
