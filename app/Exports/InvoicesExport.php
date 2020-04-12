<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvoicesExport implements FromQuery, ShouldQueue, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function query()
   {
       return Invoice::query();
   }

    /**
     * @return array
     * @var Invoice $invoice
     */
    public function map($invoice): array
    {
        return [

            $invoice->id,
            $invoice->state,
            $invoice->subTotal,
            $invoice->total,
            $invoice->iva,
            $invoice->created_at,
            $invoice->expiration_date,
            $invoice->client->id,
            $invoice->seller->id,
            $invoice->invoice_products
        ];
    }

    public function headings(): array
    {
        return [
            'Id factura',
            'Estado factura',
            'Subtotal',
            'Total',
            'iva',
            'Fecha de creación',
            'Fecha de expiracion',
            'Id cliente',
            'Id vendedor',
            'Productos'
        ];
    }




}
