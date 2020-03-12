<?php

namespace App\Http\Controllers\api;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
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
            'id' => 'required',
            'document_type_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

        $client = new Client();
        $client->id = $validData['id'];
        $client->document_type_id = $validData['document_type_id'];
        $client->first_name = $validData['first_name'];
        $client->last_name = $validData['last_name'];
        $client->phone_number = $validData['phone_number'];
        $client->address = $validData['address'];
        $client->email  = $validData['email'];
        $client->save();

        return response(['message' => 'Cliente Almacenado']);


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index');
    }
}
