<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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
    public function index(Request $request)
    {
        $id = $request->get('id');
        return view('Products.index', [
            'products' => Product::orderBy('id', 'asc')
                ->id($id)
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.create');
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
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required'
        ]);

        $product = new Product;
        $product->id = $request->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_value = $request->unit_value;
        
        $product->save();
        return back()->with('message', 'Producto Añadido');
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
        $product = Product::findOrFail($id);
        return view('Products.edit',[
            'product' => $product
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
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required'
        ]);
        
        $product = Product::findOrFail($id);
        $product->id = $request->get('id');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->unit_value = $request->get('unit_value');

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }

    public function confirmDelete($id){
        $product = Product::findOrFail($id);
        return view('Products.confirmDelete', [
            'product' => $product
        ]);
    }


   public function export(){
    return Excel::download(new ProductsExport, 'products-' . date('Y-m-d') . '.xlsx');
}

public function import(Request $request){
   $file = $request->file('file');

   Excel::import(new ProductsImport, $file);
   return back();
} 
}
