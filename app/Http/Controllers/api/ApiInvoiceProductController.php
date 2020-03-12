<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Invoice_product;
use Illuminate\Http\Request;

class ApiInvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice_product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function destroy($id)
    {
        $invoiceProduct = Invoice_product::findOrFail($id);
        $invoiceProduct->delete();
        $this->updateOrder($invoice);
        return redirect()->route('invoice.show', $invoice->id);
    }
}
