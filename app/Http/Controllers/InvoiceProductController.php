<?php

namespace App\Http\Controllers;

use App\Imports\InvoiceProductsImport;
use App\Invoice;
use App\Invoice_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        return view('InvoiceProducts.create', [
            'invoice' => $invoice,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice)
    {
        $validData = $request->validate([
            'id' => 'numeric',
            'invoice_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|numeric'
            ]);

        $invoice_product = new Invoice_product();
        $invoice_product->id = $request->get('id');
        $invoice_product->invoice_id = $request->get('invoice_id');
        $invoice_product->product_id = $request->get('product_id');
        $invoice_product->quantity = $request->get('quantity');
        $invoice_product->save();
        $this->updateOrder($invoice);
        return redirect()->route('invoice.show', $invoice->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice, $id)
    {
        $invoiceProduct = Invoice_product::findOrFail($id);
        $invoiceProduct->delete();
        $this->updateOrder($invoice);
        return redirect()->route('invoice.show', $invoice->id);
    }

    public function import(Request $request, Invoice $invoice)
    {
        $file = $request->file('file');

        $import = Excel::import(new InvoiceProductsImport, $file);

        return back();
    }

    public function updateOrder(Invoice $invoice)
    {
        DB::table('invoices')
            ->where('id', $invoice->id)
            ->update(['total' => $invoice->total, 'iva' => $invoice->iva, 'subTotal' => $invoice->subTotal]);
    }

    public function updateInvoices()
    {

        $invoice = Invoice::all();
        foreach ($invoice as $invoices) {
            $this->updateOrder($invoices);
        }
        return back();
    }

}
