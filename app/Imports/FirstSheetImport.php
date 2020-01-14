<?php

namespace App\Imports;

use App\Invoice;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FirstSheetImport implements ToCollection, WithValidation, WithHeadingRow
{
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
        
            Invoice::create([
                'id' => $row['id'],
                'state' => $row['state'],
                'expedition_date' => $row['expedition_date'],
                'expiration_date' => $row['expiration_date'],
                'subtotal' => $row['subtotal'],
                'iva' => $row['iva'],
                'total' => $row['total'],
                'seller_id' => $row['seller_id'],
                'client_id' => $row['client_id'],
                ]);
        }
    }
    public function rules():array{
        
        return [
          
            'id' => 'required|numeric',
            'state' => 'required|string',
            
        ];
    }

    public function customValidationMessages(){
        return[
          'id.required' => 'El id es requerido' ,
          'state.required' => 'El estado es requerido' 
        ];
    }

}
