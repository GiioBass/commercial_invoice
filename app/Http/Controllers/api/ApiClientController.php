<?php

namespace App\Http\Controllers\api;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Client[]|Collection
     */
    public function index()
    {
        return Client::all();
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
            'id' => 'required|numeric',
            'document_type_id' => 'required|numeric',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|numeric',
            'address' => 'required|string',
            'email' => 'required|email:rfc'
        ]);

        $client = new Client();
        $client->id = $validData['id'];
        $client->document_type_id = $validData['document_type_id'];
        $client->first_name = $validData['first_name'];
        $client->last_name = $validData['last_name'];
        $client->phone_number = $validData['phone_number'];
        $client->address = $validData['address'];
        $client->email = $validData['email'];
        $client->save();

        return response(['message' => 'Cliente Añadido']);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return Client::findOrFail($id);
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
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $validData = $request->validate([
           'id' => 'required|numeric',
           'document_type_id' => 'required|numeric',
           'first_name' => 'required|string',
           'last_name' => 'required|string',
           'phone_number' => 'required|numeric',
           'address' => 'required|string',
           'email' => 'required|email:rfc',

        ]);

        $client = Client::find($id);
        $client->id = $validData['id'];
        $client->document_type_id = $validData['document_type_id'];
        $client->first_name = $validData['first_name'];
        $client->last_name = $validData['last_name'];
        $client->phone_number = $validData['phone_number'];
        $client->address = $validData['address'];
        $client->email = $validData['email'];
        $client->save();

        return response(['message' => 'Cliente Actualizado']);
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
        return response(['message' => 'Cliente Eliminado']);
    }
}
