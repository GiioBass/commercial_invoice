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

    public function sellers(){
        $sellers = App\Seller::all();
        return view('sellers', compact('sellers'));
    }

    public function invoices(){
        $invoices = App\Invoice::all();
        return view('invoices', compact('invoices'));
    }

    public function description_client($id){
        $client = App\Client::findOrFail($id);
        return view('description_client', compact('client'));
    }
    
    public function description_product($id){
        $product = App\Product::findOrFail($id);
        return view('description_product', compact('product'));
    }
    
    public function description_seller($id){
        $seller = App\Seller::findOrFail($id);
        return view('description_seller', compact('seller'));
    }
    
    public function description_invoice($id){
        $invoice = App\Invoice::findOrFail($id);
        return view('description_invoice', compact('invoice'));
    }

    public function add_client(){
        return view('add_client');
    }

    public function add_product(){
        return view('add_product');
    }

    public function add_seller(){
        return view('add_seller');
    }

    public function add_invoice(){
        return view('add_invoice');
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

    public function create_seller(Request $request){
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $add_seller = new App\Seller;
        $add_seller->id = $request->id;
        $add_seller->first_name = $request->first_name;
        $add_seller->last_name = $request->last_name;
        $add_seller->email = $request->email;
        $add_seller->phone_number = $request->phone_number;
        
        $add_seller->save();
        return back()->with('message', 'Vendedor Añadido');
    }

    public function create_invoice(Request $request){
        
        $request -> validate([
            'id' => 'required',
            'expedition_date' => 'required',
            'expiration_date' => 'required',
            'iva' => 'required',
            'total' => 'required',
            'sellers_id' => 'required',
            'clients_id' => 'required',
        ]);

        $add_invoice = new App\Invoice;
        $add_invoice->id = $request->id;
        $add_invoice->expedition_date = $request->expedition_date;
        $add_invoice->expiration_date = $request->expiration_date;
        $add_invoice->iva = $request->iva;
        $add_invoice->total = $request->total;
        $add_invoice->sellers_id = $request->sellers_id;
        $add_invoice->clients_id = $request->clients_id;
        
        $add_invoice->save();
        return back()->with('message', 'Factura Creada');
    }

    public function edit_client($id){
        $client = App\Client::findorfail($id);
        return view('edit_client', compact('client'));
    }

    public function edit_product($id){
        $product = App\Product::findorfail($id);
        return view('edit_product', compact('product'));
    }

    public function edit_seller($id){
        $seller = App\Seller::findorfail($id);
        return view('edit_seller', compact('seller'));
    }

    public function edit_invoice($id){
        $invoice = App\Invoice::findorfail($id);
        return view('edit_invoice', compact('invoice'));
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

    public function update_seller(Request $request, $id){
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        
        $update_seller = App\Seller::findOrFail($id);
        $update_seller->id = $request->id;
        $update_seller->first_name = $request->first_name;
        $update_seller->last_name = $request->last_name;
        $update_seller->email = $request->email;
        $update_seller->phone_number = $request->phone_number;

        $update_seller->save();
        return back()->with('message', 'Vendedor Actualizado');
    }

    public function update_invoice(Request $request, $id){
        
        $request -> validate([
            'id' => 'required',
            'expedition_date' => 'required',
            'expiration_date' => 'required',
            'iva' => 'required',
            'total' => 'required',
            'sellers_id' => 'required',
            'clients_id' => 'required',
        ]);

        $update_invoice = App\Invoice::findOrFail($id);
        $update_invoice->id = $request->id;
        $update_invoice->expedition_date = $request->expedition_date;
        $update_invoice->expiration_date = $request->expiration_date;
        $update_invoice->iva = $request->iva;
        $update_invoice->total = $request->total;
        $update_invoice->sellers_id = $request->sellers_id;
        $update_invoice->clients_id = $request->clients_id;
        
        $update_invoice->save();
        return back()->with('message', 'Factura Actualizada');
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

    public function delete_seller($id){
        $delete_seller = App\Seller::findOrFail($id);
        $delete_seller->delete();
        return redirect('sellers');
    }

    public function delete_invoice($id){
        $delete_invoice = App\Invoice::findOrFail($id);
        $delete_invoice->delete();
        return redirect('invoices');
    }
}
