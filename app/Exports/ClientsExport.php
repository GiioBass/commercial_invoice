<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClientsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::all();
    }

    public function headings():array
    {
        return[
            'Id',
            'Nombres',
            'Apellidos',
            'Número Telefonico',
            'Dirección',
            'Fecha Creación',
            'Ultima Actualización'
        ];
    }
}
