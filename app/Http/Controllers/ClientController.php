<?php

namespace App\Http\Controllers;

use App\Client;
use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
     * @param Request $request
     * @return Factory|View
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
     * @return Response
     */
    public function create()
    {
        return view('Clients.create');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
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

        $client = new Client();
        $client->id = $validData['id'];
        $client->document_type_id = $validData['document_type_id'];
        $client->first_name = $validData['first_name'];
        $client->last_name = $validData['last_name'];
        $client->phone_number = $validData['phone_number'];
        $client->email = $validData['email'];
        $client->address = $validData['address'];

        $client->save();
        return back()->with('message', 'Cliente Añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @return Response
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
        $client->id = $validData['id'];
        $client->document_type_id = $validData['document_type_id'];
        $client->first_name = $validData['first_name'];
        $client->last_name = $validData['last_name'];
        $client->phone_number = $validData['phone_number'];
        $client->email = $validData['email'];
        $client->address = $validData['address'];

        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function confirmDelete($id)
    {
        $client = Client::findOrFail($id);
        return view('Clients.confirmDelete', [
            'client' => $client,
        ]);
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new ClientsExport, 'clients-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ClientsImport, $file);
        return back();
    }
}
