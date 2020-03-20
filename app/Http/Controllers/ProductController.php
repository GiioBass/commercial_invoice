<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductController extends Controller
{
    public function __construct()
    {
    }


    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $id = $request->get('id');

        return view('Products.index', [
            'products' => Product::orderBy('id', 'asc')
                ->id($id)
                ->paginate(10),
        ], compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Products.create');
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
        return back()->with('message', 'Producto Añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Products.edit', [
            'product' => $product,
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
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->id = $validData['id'];
        $product->name = $validData['name'];
        $product->description = $validData['description'];
        $product->unit_value = $validData['unit_value'];

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function confirmDelete($id)
    {
        $product = Product::findOrFail($id);
        return view('Products.confirmDelete', [
            'product' => $product,
        ]);
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new ProductsExport, 'products-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ProductsImport, $file);
        return back();
    }
}
