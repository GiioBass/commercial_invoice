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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <div>
        <h2>Buscar:</h2>
    </div>
    <div>
        <form action="/invoice" method="get">
            <div class="list">
                <select class="list-select" name="state" id="" placeholder="Estado" style="width: 120px " >
                    <option value="" > </option>
                    <option value="Por pagar">Por Pagar</option>
                    <option value="Pagado">Pagado</option>
                </select>
                <label for="">Buscar: </label>
                <input type="search" name="id" placeholder="Id Factura">
                <input type="search" name="seller_id" placeholder="Id Vendedor">
                <input type="search" name="client_id" placeholder="Id Clientes">
            </div>
            <div>
                <label for="">Desde: </label>
                <input type="date" name="dateStart" id="" >
                <label for="">Hasta: </label>
                <input type="date" name="dateFinish" id="">
            </div>
            <div>
                <input type="submit" value="Buscar">
            </div>
        </form>
    </div>
</div>
<div>
    <br>
</div>
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
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach($invoices as $invoice)
            <tr>
                <div style="width:50%; margin: 0px auto; font-size: 20px">
                    <td>
                        <a href="{{route('invoice.show', $invoice->id)}}">
                            <i  class="material-icons">visibility</i>
                        </a>
                    </td>
                    <td>{{number_format($invoice->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                    <td>{{$invoice->state}}</td>
                    <td>{{$invoice->client->first_name}}</td>
                    <td>{{$invoice->expedition_date}}</td>
                    <td>{{$invoice->expiration_date}}</td>
                    <td>${{number_format($invoice->total, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                    <td>{{$invoice->seller->first_name}}</td>
                    <td>
                        <a href="/invoice/{{$invoice->id}}/edit">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="/invoice/{{$invoice->id}}/confirmDelete">
                            <i class="material-icons">delete_outline</i>
                        </a>
                    </td>
                    
                </div>
            </tr>
        @endforeach()
    </table>
</div>
<div class="container-pagination">
    {{$invoices->appends($_GET)->links()}}
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

@endsection