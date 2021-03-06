<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Invoice[]|Collection
     */
    public function index()
    {
        return Invoice::all();
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
    public function store(Request $request)
    {
        $validData = $request->validate([

            'state' => 'required|string',
            'expedition_date' => 'required|date',
            'expiration_date' => 'required|date',
            'seller_id' => 'required|numeric',
            'client_id' => 'required|numeric',
        ]);

        $invoice = new Invoice;
        $invoice->code = $this->createCode();
        $invoice->state = $validData['state'];
        $invoice->expedition_date = $validData['expedition_date'];
        $invoice->expiration_date = $validData['expiration_date'];
        $invoice->subtotal = 0;
        $invoice->iva = 0;
        $invoice->total = 0;
        $invoice->seller_id = $validData['seller_id'];
        $invoice->client_id = $validData['client_id'];
        $invoice->save();

        return response(['message' => 'Factura Almacenada']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        return Invoice::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'id' => 'required|numeric',
            'state' => 'required|string',
            'expedition_date' => 'required|date',
            'expiration_date' => 'required|date',
            // 'iva' => 'required',
            // 'total' => 'required',
            // 'subTotal' => 'required',
            'seller_id' => 'required|numeric',
            'client_id' => 'required|numeric',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->id = $validData['id'];
        $invoice->state = $validData['state'];
        $invoice->expedition_date = $validData['expedition_date'];
        $invoice->expiration_date = $validData['expiration_date'];
        // $invoice->iva = $request->get('iva');
        // $invoice->total = $request->get('total');
        // $invoice->subTotal = $request->get('subTotal');
        $invoice->seller_id = $validData['seller_id'];
        $invoice->client_id = $validData['client_id'];

        $invoice->save();
        return response(['message' => 'Factura Actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return response(['message' => 'Factura Eliminada']);
    }
}
