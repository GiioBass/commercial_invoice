@extends('template')

@section('content')

   

    <div style="text-align: center">
        <h1>Detalles Factura {{number_format($invoices->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</h1>
    </div>

    <div style="margin: auto; background-color: aliceblue ; width: 80%">
        <div>
            <p>
                Cliente:  {{number_format($invoices->client->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
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
                <td >{{number_format($product->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>$ {{number_format($product->unit_value, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                <td>$ {{number_format($product->unit_value * $product->pivot->quantity, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                <td><a href="/invoice/{{$invoices->id}}/invoice_product/{{$product->pivot->id}}/destroy">Eliminar</a></td>
            </tr>
            @endforeach
            
        </table>

    <div style="margin: auto; width: 60%;  text-align: right">
        <p style="font-style: oblique">
            Total antes de Iva: $ {{number_format($invoices->subtotal, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
        </p>
        <p>
            IVA: $ {{number_format($invoices->iva, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
        </p>
        <h3>
            Total: $ {{number_format($invoices->total, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
        </h3>
    </div>


<div style="width: 100%; ">
    <div style="margin: 50px 0px;  width: 60px; height: 30px; ">
        <a style="font-size: 20px" href="{{route('invoice.index')}}">Atras</a>
    <div>
    
           
</div>
<div style="margin-bottom:50px; width: 50px ">

</div>
@endsection
