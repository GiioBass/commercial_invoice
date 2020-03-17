<?php

namespace App\Http\Controllers\api;

use App\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Seller[]|Collection
     */
    public function index()
    {
        return Seller::all();
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc',
            'phone_number' => 'required|numeric',
        ]);

        $seller = new Seller();
        $seller->id = $validData['id'];
        $seller->first_name = $validData['first_name'];
        $seller->last_name = $validData['last_name'];
        $seller->email = $validData['email'];
        $seller->phone_number = $validData['phone_number'];

        $seller->save();
        return response(['message' => 'Vendedor Añadido']);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return Seller::findOrFail($id);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc',
            'phone_number' => 'required|numeric',
        ]);

        $seller = Seller::findOrFail($id);
        $seller->id = $validData['id'];
        $seller->first_name = $validData['first_name'];
        $seller->last_name = $validData['last_name'];
        $seller->email = $validData['email'];
        $seller->phone_number = $validData['phone_number'];

        $seller->save();
        return response(['message' => 'Vendedor Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        return response(['message' => 'Vendedor Eliminado']);
    }
}
