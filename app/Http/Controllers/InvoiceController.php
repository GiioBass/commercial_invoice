<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\Invoice_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
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
        return view('Invoices.index',[
            'invoices' => Invoice::paginate(10)
           
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
        $validData = $request -> validate([
            
            'id' => 'required',
            'state' => 'required',
            'expedition_date' => 'required',
            'expiration_date' => 'required',
            'iva' => 'required',
            'total' => 'required',
            'seller_id' => 'required',
            'client_id' => 'required',
        ]);

        $invoice = new Invoice;
        
        $invoice->id = $request->id;
        $invoice->state = $request->state;
        $invoice->expedition_date = $request->expedition_date;
        $invoice->expiration_date = $request->expiration_date;
        $invoice->iva = $request->iva;
        $invoice->total = $request->total;
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
            'invoices' => $invoice
            
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
            'invoice' => $invoice
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
        $validData = $request -> validate([
            'id' => 'required',
            'state' => 'required',
            'expedition_date' => 'required',
            'expiration_date' => 'required',
            'iva' => 'required',
            'total' => 'required',
            'seller_id' => 'required',
            'client_id' => 'required',
        ]);
        
        $invoice = Invoice::findOrFail($id);
        $invoice->id = $request->get('id');
        $invoice->state = $request->get('state');
        $invoice->expedition_date = $request->get('expedition_date');
        $invoice->expiration_date = $request->get('expiration_date');
        $invoice->iva = $request->get('iva');
        $invoice->total = $request->get('total');
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
        return view('Invoices.confirmDelete',[
            'invoice' => $invoice
        ]);
        return redirect()->route('invoice.index');
    }

   public function updateOrder($id){
       $invoice = Invoice::findOrFail($id);

        DB::table('invoices')
            ->where('id', $invoice->id)
            ->update(['total' => $invoice->total, 'iva' => $invoice->iva]);

        return redirect()->route('invoice.index');
   }

  

}
