<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function clients(){
        $clients = App\Client::all();

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
        //return $request->all();

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

    public function client_edit($id){
        $client = App\Client::findorfail($id);
        return view('client_edit', compact($client));
    }
}
