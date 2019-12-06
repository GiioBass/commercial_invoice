@extends('template')

@section('content')
<div style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO DE FACTURAS</h1>
</div>

@foreach($invoices as $invoice)
    <tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                <a href="{{route('invoice.show', $invoice->id)}}">
                        * Ver - 
                </a>
            </td>
            <td>- {{$invoice->expedition_date}} - </td>
            <td>- {{$invoice->expiration_date}} - </td>
            <td>- {{$invoice->total}} - </td>
            <td>- {{$invoice->client_id}} - </td>
            <td>- {{$invoice->seller_id}} - </td>
            <td><a href="/invoice/{{$invoice->id}}/edit">Editar /</a></td>
            <td><a href="/invoice/{{$invoice->id}}/confirmDelete">Eliminar</a></td>
            <br>
        </div>
    </tr>
@endforeach()

<div style="text-align:center; margin:50px">
   <a href="{{route('invoice.create')}}">Añadir Nueva Factura</a>
</div>

@endsection