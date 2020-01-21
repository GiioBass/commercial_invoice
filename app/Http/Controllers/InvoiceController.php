<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Imports\InvoicesImport;
use App\Invoice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $state = $request->get('state');
        $id = $request->get('id');
        $dateStart = $request->get('dateStart');
        $dateFinish = $request->get('dateFinish');
        $seller_id = $request->get('seller_id');
        $client_id = $request->get('client_id');

        return view('Invoices.index', [
            'invoices' => Invoice::orderBy('id', 'asc')
                ->with('client', 'seller', 'products' )
                ->state($state)
                ->id($id)
                ->dates($dateStart, $dateFinish)
                ->seller($seller_id)
                ->client($client_id)
                ->paginate(10),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Invoices.create');
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

            'state' => 'required|string',
            'expedition_date' => 'required|date',
            'expiration_date' => 'required|date',
            'seller_id' => 'required|numeric',
            'client_id' => 'required|numeric',
        ]);

        $invoice = new Invoice;
        $invoice->state = $request->state;
        $invoice->expedition_date = $request->expedition_date;
        $invoice->expiration_date = $request->expiration_date;
        $invoice->subtotal = 0;
        $invoice->iva = 0;
        $invoice->total = 0;
        $invoice->seller_id = $request->seller_id;
        $invoice->client_id = $request->client_id;
        $invoice->save();
        return back()->with('message', 'Factura Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('Invoices.show', [
            'invoices' => $invoice,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('Invoices.edit', [
            'invoice' => $invoice,
        ]);
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
        $invoice->id = $request->get('id');
        $invoice->state = $request->get('state');
        $invoice->expedition_date = $request->get('expedition_date');
        $invoice->expiration_date = $request->get('expiration_date');
        // $invoice->iva = $request->get('iva');
        // $invoice->total = $request->get('total');
        // $invoice->subTotal = $request->get('subTotal');
        $invoice->seller_id = $request->get('seller_id');
        $invoice->client_id = $request->get('client_id');

        $invoice->save();
        return redirect()->route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoice.index');
    }

    public function confirmDelete($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('Invoices.confirmDelete', [
            'invoice' => $invoice,
        ]);
        return redirect()->route('invoice.index');
    }

    public function export()
    {
        return Excel::download(new InvoicesExport, 'invoices-' . date('Y-m-d') . '.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new InvoicesImport, $file);
        return back();
    }

}
