@extends('template')

@section('content')

   

    <div style="text-align: center">
        <h1>Detalles Factura {{$invoices->id}}</h1>
    </div>

    <div style="margin: auto; background-color: aliceblue ; width: 60%">
        <div>
            <p>
                Cliente:  {{$invoices->client->id}}
            </p>
        </div>
        <div>
            <p>
                Cliente:  {{$invoices->client->first_name}}
            </p>
        </div>
        <div>
            <p>
                Vendedor:  {{$invoices->seller->first_name}}
            </p>
        </div>
        <div>
            <p>
                Fecha Creación:  {{$invoices->created_at}}
            </p>
        </div>
        <div>
            <p>
                Fecha Vencimiento:  {{$invoices->expiration_date}}
            </p>
        </div>
        <div>
            <p>
                Estado de la Factura: {{$invoices->state}}
            </p>
        </div>
    <div> 

    <div>
        <a href="/invoice/{{$invoices->id}}/invoice_product/create">Agregar Producto</a>
    </div>
    <div>
        <a href="/invoice/{{$invoices->id}}/updateOrder">Confirmar Compra</a>
    </div>

    <div>
    <h3 style="text-align: center">Detalles</h3>
    </div>

    <table style="margin: auto">
        <tr>
            <td>Id</td>
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Valor unidad</td>
            <td>Total producto</td>
        </tr>
        @foreach ($invoices->products as $product)
            <tr style="text-align: center">
                <td >{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>{{$product->unit_value}}</td>
                <td>{{$product->unit_value * $product->pivot->quantity}}</td>
                <td><a href="/invoice/{{$invoices->id}}/invoice_product/{{$product->pivot->id}}/destroy">Eliminar</a></td>
            </tr>
            @endforeach
            
        </table>

    <div style="margin: auto; width: 60%; background-color: aqua; text-align: right">
        <p style="font-style: oblique">
            Total antes de Iva:  {{$invoices->total}}
        </p>
        <p>
            IVA: {{$invoices->iva}}
        </p>
        <h3>
            Total:  {{$invoices->total}}
        </h3>
    </div>


<div style="width: 100%; ">
    <div style="margin: 50px 0px; background-color: blueviolet; width: 60px; height: 30px; ">
        <a style="font-size: 20px" href="{{route('invoice.index')}}">Atras</a>
    <div>
    
           
</div>
<div style="margin-bottom:50px; width: 50px ">

</div>
@endsection
