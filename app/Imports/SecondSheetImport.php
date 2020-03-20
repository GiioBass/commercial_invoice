<?php

namespace App\Imports;

use App\Invoice_product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SecondSheetImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    //TODO No importa la segunda hoja de excel, queda en blanco

    /**
     * @inheritDoc
     */
    public function model(Array $row)
    {
        return new Invoice_product([
            'quantity' => $row['quantity'],
            'invoice_id' => $row['invoice_id'],
            'product_id' => $row['product_id'],

        ]);
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'quantity' => 'required|numeric',
            'invoice_id' => 'required|numeric',
            'product_id' => 'required|numeric',
        ];
    }
    public function customValidationMessages()
    {
        return[
            'quantity.required' => 'la cantidad de la orden es requerida',
            'quantity.numeric' => 'la cantidad de la orden debe ser númerica',
            'invoice_id.required' => 'El id de la factura en la orden es requerido',
            'invoice_id.numeric' => 'El id de la factura en la orden debe ser númerico ',
            'product_id.required' => 'El id del producto en la orden es requerido',
            'product_id.numeric' => 'El id del producto en la orden debe ser númerico',
        ];
    }

//    public function customValidationAttributes(){
//        return[
//            'quantity' => 'cantidad',
//            'invoice_id' => 'factura',
//            'product_id' => 'producto',
//        ];
//    }
}
