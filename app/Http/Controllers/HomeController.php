<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return redirect('clients');
    }
    
    public function clients(){
        $clients = App\Client::all();
        return view('clients', compact('clients'));
    }
    
    public function products(){
        $products = App\Product::all();
        return view('products', compact('products'));
    }

    public function description_client($id){
        $client = App\Client::findOrFail($id);
        return view('description_client', compact('client'));
    }
    
    public function description_product($id){
        $product = App\Product::findOrFail($id);
        return view('description_product', compact('product'));
    }

    public function add_client(){
        return view('add_client');
    }

    public function add_product(){
        return view('add_product');
    }

    public function create_client(Request $request){
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        $add_client = new App\Client;
        $add_client->id = $request->id;
        $add_client->first_name = $request->first_name;
        $add_client->last_name = $request->last_name;
        $add_client->phone_number = $request->phone_number;
        $add_client->address = $request->address;

        $add_client->save();
        return back()->with('message', 'Cliente Añadido');
    }

    public function create_product(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required'
        ]);

        $add_product = new App\Product;
        $add_product->id = $request->id;
        $add_product->name = $request->name;
        $add_product->description = $request->description;
        $add_product->unit_value = $request->unit_value;
        
        $add_product->save();
        return back()->with('message', 'Producto Añadido');
    }

    public function edit_client($id){
        $client = App\Client::findorfail($id);
        return view('edit_client', compact('client'));
    }

    public function edit_product($id){
        $product = App\Product::findorfail($id);
        return view('edit_product', compact('product'));
    }
    
    public function update_client(Request $request, $id){
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $update_client = App\Client::findOrFail($id);
        $update_client->first_name = $request->first_name;
        $update_client->last_name = $request->last_name;
        $update_client->phone_number = $request->phone_number;
        $update_client->address = $request->address;
        
        $update_client->save();
        return back()->with('message', 'Cliente Actualizado');
    }
    
    public function update_product(Request $request, $id){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_value' => 'required',
            
            ]);
            
        $update_product = App\Product::findOrFail($id);
        $update_product->id = $request->id;
        $update_product->name = $request->name;
        $update_product->description = $request->description;
        $update_product->unit_value = $request->unit_value;

        $update_product->save();
        return back()->with('message', 'Producto Actualizado');
    }

    public function delete_client($id){
        $delete_client = App\Client::findOrFail($id);
        $delete_client->delete();
        return redirect('clients');
    }

    public function delete_product($id){
        $delete_product = App\Product::findOrFail($id);
        $delete_product->delete();
        return redirect('products');
    }
}
