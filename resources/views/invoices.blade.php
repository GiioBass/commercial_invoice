@extends('template')

@section('content')
<div style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO DE FACTURAS</h1>
</div>

@foreach($invoices as $invoice)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                <a href="{{route('description_invoice', $invoice)}}" style="font-size: 18px ; color: #1f00ff ;">
                    Ver 
                </a>    
            </td>
            <td>- {{$invoice->id}} - </td>
            <td>- {{$invoice->expedition_date}} - </td>
            <td>- {{$invoice->expiration_date}} - </td>
            <td>- {{$invoice->total}} - </td>
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
   <a href="{{route('add_invoice')}}">Añadir Nueva Factura</a>
</div>

@endsection