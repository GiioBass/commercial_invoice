<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InvoicesImport implements WithMultipleSheets, WithChunkReading
{

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new FirstSheetImport(),
            new SecondSheetImport(),

        ];
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 200;
    }
}
