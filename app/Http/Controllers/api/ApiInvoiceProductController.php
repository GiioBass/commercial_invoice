<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Invoice_product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ApiInvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Invoice_product[]|Collection
     */
    public function index()
    {
        return Invoice_product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
        $invoice_product->id = $validData['id'];
        $invoice_product->invoice_id = $validData['invoice_id'];
        $invoice_product->product_id = $validData['product_id'];
        $invoice_product->quantity = $validData['quantity'];
        $invoice_product->save();
        $this->updateOrder($invoice);
        return response(['message' => 'Producto Añadido']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        return Invoice_product::findOrFail($id);
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
    public function update(Request $request, $id, Invoice $invoice)
    {
        $validData = $request->validate([
            'id' => 'numeric',
            'invoice_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|numeric'
        ]);

        $invoice_product = Invoice_product::findOrFail($id);
        $invoice_product->id = $validData['id'];
        $invoice_product->invoice_id = $validData['invoice_id'];
        $invoice_product->product_id = $validData['product_id'];
        $invoice_product->quantity = $validData['quantity'];
        $invoice_product->save();
        $this->updateOrder($invoice);
        return response(['message' => 'Producto Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Invoice $invoice
     * @return Response
     */
    public function destroy( Invoice $invoice, $id)
    {
        $invoiceProduct = Invoice_product::findOrFail($id);
        $invoiceProduct->delete();
        $this->updateOrder($invoice);
        return response(['message' => 'Producto Eliminado']);
    }

    public function updateOrder(Invoice $invoice)
    {
        DB::table('invoices')
            ->where('id', $invoice->id)
            ->update(['total' => $invoice->total, 'iva' => $invoice->iva, 'subTotal' => $invoice->subTotal]);
    }
}
