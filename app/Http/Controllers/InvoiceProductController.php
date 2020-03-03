<?php

namespace App\Http\Controllers;

use App\Imports\InvoiceProductsImport;
use App\Invoice;
use App\Invoice_product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceProductController extends Controller
{
    /**
     * InvoiceProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return Response
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
     * @param Request $request
     * @param Invoice $invoice
     * @return Response
     */
    public function store(Request $request, Invoice $invoice)
    {
        $validData = $request->validate([
//            'id' => 'numeric',
            'invoice_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|numeric'
        ]);

        $invoice_product = new Invoice_product();
//        $invoice_product->id = $validData['id'];
        $invoice_product->invoice_id = $validData['invoice_id'];
        $invoice_product->product_id = $validData['product_id'];
        $invoice_product->quantity = $validData['quantity'];
        $invoice_product->save();
        $this->updateOrder($invoice);
        return redirect()->route('invoice.show', $invoice->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @param int $id
     * @return Response
     */
    public function destroy(Invoice $invoice, $id)
    {
        $invoiceProduct = Invoice_product::findOrFail($id);
        $invoiceProduct->delete();
        $this->updateOrder($invoice);
        return redirect()->route('invoice.show', $invoice->id);
    }

    /**
     * @param Request $request
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function import(Request $request, Invoice $invoice)
    {
        $file = $request->file('file');

        $import = Excel::import(new InvoiceProductsImport, $file);

        return back();
    }

    /**
     * @param Invoice $invoice
     */
    public function updateOrder(Invoice $invoice)
    {
        DB::table('invoices')
            ->where('id', $invoice->id)
            ->update(['total' => $invoice->total, 'iva' => $invoice->iva, 'subTotal' => $invoice->subTotal]);
    }

    /**
     * @return RedirectResponse
     */
    public function updateInvoices()
    {
        $invoice = Invoice::all();
        foreach ($invoice as $invoices) {
            $this->updateOrder($invoices);
        }
        return back();
    }
}
