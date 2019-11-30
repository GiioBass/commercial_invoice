@extends('template')

@section('content')
<div style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO DE FACTURAS</h1>
</div>

@foreach($invoices as $invoice)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>* {{$invoice->id}} - </td>
            <td>- {{$invoice->expedition_date}} - </td>
            <td>- {{$invoice->expiration_date}} - </td>
            <td>- {{$invoice->total}} - </td>
            <td>- {{$invoice->clients_id}} - </td>
            <td>- {{$invoice->sellers_id}} - </td>
            <td><a href="/invoice/{{$invoice->id}}/edit">Editar /</a></td>
            <td><a href="/invoice/{{$invoice->id}}/confirmDelete">Eliminar</a></td>
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
   <a href="{{route('invoice.create')}}">Añadir Nueva Factura</a>
</div>

@endsection