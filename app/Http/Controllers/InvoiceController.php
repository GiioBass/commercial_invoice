<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Imports\InvoicesImport;
use App\Invoice;
use App\Jobs\NotifyUserCompleteExport;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InvoiceController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|Response|View
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
                ->with('client', 'seller', 'products')
                ->state($state)
                ->id($id)
                ->dates($dateStart, $dateFinish)
                ->seller($seller_id)
                ->client($client_id)
                ->paginate(10),

        ], compact('id', 'dateStart', 'dateFinish', 'seller_id', 'client_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function createCode()
    {
        $invoice = Invoice::all()->last();

        if ($invoice === null) {
            $invoice = 1;
            return date('y') . date('d') . date('H') . $invoice;
        } else {
            $lastDigit = Invoice::all()->last()->id;
            $lastDigit = substr($lastDigit, -1);
            $lastDigit += 1;
            return date('y') . date('d') . date('H') . $lastDigit;
        }
    }


    public function store(Request $request)
    {
        $validData = $request->validate([

            'state' => 'required|string',
            'expedition_date' => 'required|date',
            'expiration_date' => 'required|date',
            'seller_id' => 'required|numeric',
            'client_id' => 'required|numeric',
        ]);
        $code = $this->createCode();
        $invoice = new Invoice;
        $invoice->id = $code;
        $invoice->state = $validData['state'];
        $invoice->expedition_date = $validData['expedition_date'];
        $invoice->expiration_date = $validData['expiration_date'];
        $invoice->subtotal = 0;
        $invoice->iva = 0;
        $invoice->total = 0;
        $invoice->seller_id = $validData['seller_id'];
        $invoice->client_id = $validData['client_id'];
        $invoice->save();
        return redirect()->route('invoice.show', $code)->with('message', 'Factura Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function show(Invoice $invoice)
    {
        $invoices = $invoice;

        return view('Invoices.show', compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
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
        return redirect()->route('invoice.index');
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
        return redirect()->route('invoice.index');
    }

    /**
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function confirmDelete($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('Invoices.confirmDelete', [
            'invoice' => $invoice,
        ]);
        return redirect()->route('invoice.index');
    }

    /**
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function export(Request $request)
    {
        $typeFile = $request->get('typeFile');
        $user = auth()->user();
        $nameFile = ('invoices-' . date('Ymd-Gis') . '.' . $typeFile);
        $filePath = asset('storage/' . $nameFile, 'public');
        (new InvoicesExport)->store($nameFile, 'public')->chain([
            new NotifyUserCompleteExport($user, $filePath)
        ]);
        return back();
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new InvoicesImport, $file);
        return back();
    }
}
