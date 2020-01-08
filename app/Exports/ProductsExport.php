<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings():array
    {
        return[
            'id',
            'Nombre',
            'Descripción',
            'Valor Unidad',
            'Fecha de Creación',
            'Ultima Actualización'
        ];
    }
}
