<?php

namespace App\Exports;

use App\Seller;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SellersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Seller::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nombres',
            'Apellidos',
            'e-mail',
            'Número Telefono',
            'Fecha Creación',
            'Ultima Actualización',
        ];
    }
}
