<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class InvoicesExport implements FromQuery , WithHeadings, ShouldAutoSize
{
    public function query()
    {
        $invoice_product = DB::table('invoice_product')
        ->join('products', 'invoice_product.product_id', '=', 'products.id')
        ->join('invoices', 'invoice_product.invoice_id', '=', 'invoices.id')
        ->select('invoice_product.invoice_id','invoices.state', 'invoices.expedition_date',
            'invoices.expiration_date','products.name','invoice_product.quantity', 'invoices.subtotal',
             'invoices.iva', 'invoices.total')
            ->orderBy('invoice_product.invoice_id');
        
        return $invoice_product;
    }


    public function headings(): array
    {
        return [
            'Factura ID',
            'Estado',
            'Fecha Expedición',
            'Fecha Expiración',
            'Producto',
            'Cantidad',
            'SubTotal',
            'Iva',
            'Total',
            
            
        ];
    }

    
    
}
