<?php

namespace App\Imports;

use App\Invoice;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FirstSheetImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Invoice([
                'code' => $row['code'],
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

    public function rules(): array
    {
        return[
                'code' => 'required|numeric',
                'state' => 'required|string',
                'expedition_date' => 'required|date',
                'expiration_date' => 'required|date',
                'subtotal' => 'required',
                'iva' => 'required',
                'total' => 'required',
                'seller_id' => 'required|numeric',
                'client_id' => 'required|numeric',
            ];
    }

    public function customValidationMessages()
    {
        return [
                'code.required' => 'El código es requerido.',
                'code.numeric' => 'El código debe ser númerico.',
                'state.required' => 'El Estado de la factura es requerido.',
                'state.string' => 'El Estado debe ser "Pago" o "Por Pagar".',
                'expedition_date.required' => 'La fecha de expedición es requerido.',
                'expedition_date.date' => 'La fecha de expedición no tiene el formato correcto.',
                'expiration.required' => 'La fecha de expiración es requerido.',
                'expiration.date' => 'La fecha de expiración no tiene el formato correcto.',
                'seller_id.required' => 'El codigo del vendedor es requerido.',
                'seller_id.numeric' => 'El codigo del vendedor debe ser númerico.',
                'client.required' => 'El codigo del cliente es requerido.',
                'client.numeric' => 'El codigo del cliente debe ser númerico.',
            ];
    }

    public function customValidationAttributes()
    {
        return[
                'code' => 'codigo',
                'state' => 'estado',
                'expedition_date' => 'fecha de expedicion',
                'expiration_date' => 'fecha de expiracion',
                'subtotal' => 'subtotal',
                'iva' => 'iva',
                'total' => 'total',
                'seller_id' => 'vendedor',
                'client_id' => 'cliente',
            ];
    }
}
