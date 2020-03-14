<?php

namespace App\Http\Controllers;

use App\Exports\SellersExport;
use App\Imports\SellersImport;
use App\Seller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SellerController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');

        return view('Sellers.index', [
            'sellers' => Seller::orderBy('id', 'asc')
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
        return view('Sellers.create');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
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
        $seller->id = $request->input('id');
        $seller->first_name = $request->input('first_name');
        $seller->last_name = $request->input('last_name');
        $seller->email = $request->input('email');
        $seller->phone_number = $request->input('phone_number');

        $seller->save();
        return
            redirect()->route('seller.create') ;
//            back()->with('message', 'Vendedor Añadido');
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
        $seller = Seller::findOrFail($id);
        return view('Sellers.edit', [
            'seller' => $seller,
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
        return redirect()->route('seller.index');
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
        return redirect()->route('seller.index');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function confirmDelete($id)
    {
        $seller = Seller::findOrFail($id);
        return view('Sellers.confirmDelete', [
            'seller' => $seller,
        ]);
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new SellersExport(), 'sellers-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new SellersImport(), $file);
        return back();
    }
}
