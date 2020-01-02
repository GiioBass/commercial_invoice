<?php

// namespace App\Exports;

// use App\Invoice;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromQuery;

// class InvoicesExport implements FromQuery, ShouldQueue
// {
//     use Exportable;

//     public function query()
//     {
//         return Invoice::query();
//     }
namespace App\Exports;

use App\Invoice;
use App\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvoicesExport implements FromQuery, WithHeadings
{
    /*
    *@var Invoice $invoice
    */
    use Exportable;

    

    

    public function query(){


        $invoices =  DB::table('invoices')
            ->join('clients', 'invoices.client_id', '=', 'clients.id')
            ->join('sellers', 'invoices.seller_id', '=', 'sellers.id')
            ->select('invoices.client_id', 'clients.first_name', 'clients.last_name', 
            'invoices.seller_id', 'sellers.email')
            ->orderby('invoices.id');
            
            return $invoices;

        // $invoice_product = DB::table('invoice_product')
        // ->join('products', 'invoice_product.product_id', '=', 'products.id')
        // ->join('invoices', 'invoice_product.invoice_id', '=', 'invoices.id')
        // ->select('invoice_product.invoice_id','invoices.expedition_date',
        //     'invoices.expiration_date','products.name','invoice_product.quantity',  'products.unit_value' ,'invoices.iva', 'invoices.total')
        //     ->orderBy('invoice_product.invoice_id')
            
        //     ;

        
        //     return $invoice_product;
    }


    public function headings(): array
    {
        return [
            'Factura ID',
            'Fecha Expedición',
            'Fecha Expiración',
            'Producto',
            'Cantidad',
            'Valor Unitario',
            'iva',
            'Total',
            
        ];
    }
    
}
