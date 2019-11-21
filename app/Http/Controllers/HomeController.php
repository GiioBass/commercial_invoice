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
        $clients = App\Client::paginate(2);
        return view('clients', compact('clients'));
    }

    public function description($id){
        $client = App\Client::findOrFail($id);
        return view('description', compact('client'));
    }

    public function add_client(){
        return view('add_client');
    }

    public function create_client(Request $request){
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        $addClient = new App\Client;
        $addClient->id = $request->id;
        $addClient->first_name = $request->first_name;
        $addClient->last_name = $request->last_name;
        $addClient->phone_number = $request->phone_number;
        $addClient->address = $request->address;

        $addClient->save();
        return back()->with('message', 'Cliente Añadido');
    }

    public function edit_client($id){
        $client = App\Client::findorfail($id);
        return view('edit_client', compact('client'));
    }
    
    public function update_client(Request $request, $id){
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        $update_client = App\Client::findOrFail($id);
        $update_client->first_name = $request->first_name;
        $update_client->last_name = $request->last_name;
        $update_client->phone_number = $request->phone_number;
        $update_client->address = $request->address;

        $update_client->save();
        return back()->with('message', 'Cliente Actualizado');
    }

    public function delete_client($id){
        $delete_client = App\Client::findOrFail($id);
        $delete_client->delete();
        return redirect('clients');
    }
}
