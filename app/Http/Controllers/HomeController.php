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
}
