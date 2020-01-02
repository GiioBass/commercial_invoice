@extends('template')

@section('content')
@include('styles')


<div style="text-align:center; margin:10px">
    <a href="{{route('invoice.create')}}">Nueva Factura</a>
</div>

<div>
    <table>
        <tr>
            <th>Ver</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Fecha de Expedición</th>
            <th>Fecha de Vencimiento</th>
            <th>Total</th>
            <th>Vendedor</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($invoices as $invoice)
            <tr>
                <div style="width:50%; margin: 0px auto; font-size: 20px">
                    <td>
                        <a href="{{route('invoice.show', $invoice->id)}}">
                                + 
                        </a>
                    </td>
                    <td>{{$invoice->state}}</td>
                    <td>{{$invoice->client->first_name}}</td>
                    <td>{{$invoice->expedition_date}}</td>
                    <td>{{$invoice->expiration_date}}</td>
                    <td>{{$invoice->total + $invoice->iva}}</td>
                    <td>{{$invoice->seller->first_name}}</td>
                    <td><a href="/invoice/{{$invoice->id}}/edit">Editar</a></td>
                    <td><a href="/invoice/{{$invoice->id}}/confirmDelete">Eliminar</a></td>
                    <br>
                </div>
            </tr>
        @endforeach()
    </table>
</div>

<div>
    <a href="/invoices/export">Export</a>
</div>

<form action="/invoices/import" method="post" enctype="multipart/form-data" >
@csrf
<input type="file" name="file" id="">
<button type="submit">Importar</button>
</form>

@endsection