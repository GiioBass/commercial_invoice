<?php

namespace App\Http\Controllers;

use App\Exports\SellersExport;
use App\Imports\SellersImport;
use App\Seller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SellerController extends Controller
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

        return view('Sellers.index', [
            'sellers' => Seller::orderBy('id', 'asc')
                ->id($id)
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sellers.create');
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
            'id' => 'required|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc',
            'phone_number' => 'required|numeric',
        ]);

        $seller = new Seller;
        $seller->id = $request->id;
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        $seller->email = $request->email;
        $seller->phone_number = $request->phone_number;

        $seller->save();
        return back()->with('message', 'Vendedor Añadido');
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
        $seller = Seller::findOrFail($id);
        return view('Sellers.edit', [
            'seller' => $seller,
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
            'id' => 'required|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc',
            'phone_number' => 'required|numeric',
        ]);

        $seller = Seller::findOrFail($id);
        $seller->id = $request->get('id');
        $seller->first_name = $request->get('first_name');
        $seller->last_name = $request->get('last_name');
        $seller->email = $request->get('email');
        $seller->phone_number = $request->get('phone_number');

        $seller->save();
        return redirect()->route('seller.index');
        dd('Update seller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        return redirect()->route('seller.index');
    }

    public function confirmDelete($id)
    {
        $seller = Seller::findOrFail($id);
        return view('Sellers.confirmDelete', [
            'seller' => $seller,
        ]);
    }

    public function export()
    {
        return Excel::download(new SellersExport, 'sellers-' . date('Y-m-d') . '.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new SellersImport, $file);
        return back();
    }
}
