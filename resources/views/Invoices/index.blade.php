@extends('template')

@section('content')

<div class="container-menu">
    <div class="container-item">
        <a  class="item-menu" href="{{route('invoice.create')}}">
            <div class="item-button">
                Nueva Factura
            </div>  
        </a>
        <a class="item-menu" href="/orders/updateInvoices">
            <div class="item-button">
                Actualizar Facturas
            </div>
        </a>
    </div>
</div>
<div >
<div>

<div>
    <table>
        <tr>
            <th>Ver</th>
            <th>Id</th>
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
                    <td>{{$invoice->id}}</td>
                    <td>{{$invoice->state}}</td>
                    <td>{{$invoice->client->first_name}}</td>
                    <td>{{$invoice->expedition_date}}</td>
                    <td>{{$invoice->expiration_date}}</td>
                    <td>{{$invoice->total}}</td>
                    <td>{{$invoice->seller->first_name}}</td>
                    <td><a href="/invoice/{{$invoice->id}}/edit">Editar</a></td>
                    <td><a href="/invoice/{{$invoice->id}}/confirmDelete">Eliminar</a></td>
                    
                </div>
            </tr>
        @endforeach()
    </table>
</div>
<div class="container-pagination">
    {{$invoices->links()}}
</div>
<div class="container-menu">
    <div class="container-item">
        <a class="item-menu" href="/invoices/export">
            <div class="item-button">
                Exportar Factura
            </div>  
        </a>
    </div>
</div>


<br>
<div>
    <label for="">Importar Facturas</label>
    <form action="/invoices/import" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="file" name="file" id="">
        <button type="submit">Importar</button>
    </form>
</div>
<br>
<div>
    <label for="">Importar Ordenes</label>
    <form action="/orders/import" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="file" name="file" id="">
        <button type="submit">Importar</button>
    </form>
</div>

@endsection