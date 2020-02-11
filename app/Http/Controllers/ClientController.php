<?php

namespace App\Http\Controllers;

use App\Client;
use App\DocumentType;
use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    /**
     * ClientController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');


        return view('Clients.index', [
            'clients' => Client::orderBy('id', 'asc')
                ->with('document_type')
                ->id($id)
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
        return view('Clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
//            TODO error Method Illuminate\Validation\Validator::validateRequires does not exist.
            'id' => 'required|numeric',
            'document_type_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'requires|email:rfc,dns',
            'address' => 'required',
        ]);

        $client = new Client;
        $client->id = $request->id;
        $client->document_type_id = $request->document_type_id;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->phone_number = $request->phone_number;
        $client->email = $request->email;
        $client->address = $request->address;

        $client->save();
        return back()->with('message', 'Cliente Añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrfail($id);
        return view('Clients.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'id' => 'required',
            'document_type_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'requires|email:rfc,dns',
            'address' => 'required',
        ]);

        $client = Client::findOrFail($id);
        $client->id = $request->get('id');
        $client->document_type_id = $request->document_type_id;
        $client->first_name = $request->get('first_name');
        $client->last_name = $request->get('last_name');
        $client->phone_number = $request->get('phone_number');
        $client->email = $request->email;
        $client->address = $request->get('address');

        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmDelete($id)
    {
        $client = Client::findOrFail($id);
        return view('Clients.confirmDelete', [
            'client' => $client,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new ClientsExport, 'clients-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ClientsImport, $file);
        return back();
    }
}
