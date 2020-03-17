<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|Collection
     */
    public function index()
    {
        return Product::all();
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
     * @return void
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required|numeric',
        ]);

        $product = new Product;
        $product->id = $validData['id'];
        $product->name = $validData['name'];
        $product->description = $validData['description'];
        $product->unit_value = $validData['unit_value'];

        $product->save();
        return response(['message' => 'Producto Añadido']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Product::findOrFail($id);
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
     * @return void
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required|numeric',
        ]);

        $product = new Product;
        $product->id = $validData['id'];
        $product->name = $validData['name'];
        $product->description = $validData['description'];
        $product->unit_value = $validData['unit_value'];

        $product->save();
        return response(['message' => 'Producto Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response(['message' => 'Producto Eliminado']);
    }
}
