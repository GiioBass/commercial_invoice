@extends('template')

@section('content')
@php
$total = 0;

@endphp

<div style="text-align: center">
  <h1>Detalles la Factura {{$invoices->id}}</h1>
</div>
<style>
  tr{

    border-collapse: collapse;
  }
  td{
    padding: 20px;
    border: solid 1px black;
  }
</style>
<div style="margin: auto; background-color: aliceblue ; width: 60%">
    <p>
      Cliente:  {{$invoices->client->first_name}}
    </p>
    <p>
      Vendedor:  {{$invoices->seller->first_name}}
    </p>
    <p>
      Fecha Creación:  {{$invoices->created_at}}
    </p>
    <p>
      Fecha Creación:  {{$invoices->expiration_date}}
    </p>
    <p>
      Estado de la Factura: {{$invoices->state}}
    </p>
  </div> 

<table style="margin: auto">
    <h3 style="text-align: center">Detalles</h3>
  
 
  <div>
      <a href="/invoice/{{$invoices->id}}/invoice_product/create">Agregar Producto</a>
    </div>      
    <table style="margin: auto">
      <tr>
        <td>Id:</td>
        <td>Nombre:</td>
        <td>Descripción:</td>
        <td>Valor unidad:</td>
       
      </tr>
      
      @foreach ($invoices->products as $product)
        <tr style="text-align: center">
          <td >{{$product->id}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->unit_value}}</td>
          @php
          
            $value = $product->unit_value;
            $total += $value;

          @endphp
        </tr>
        @endforeach
      </table>

      <div style="margin: auto; width: 60%; background-color: aqua; text-align: right">
          <p>
            Total neto:  {{$total}}
          </p>
          <p>
              IVA: {{$iva = $total * 0.19}}
          </p>
          <h3>
            Total:  {{$total + $iva}}
          </h3>
        </div>
        
        
      
      <div style="margin: 50px 350px">
        <a href="{{route('invoice.index')}}">Atras</a>
        <div>
          <div>
            <a href="/invoice/{{$invoices->id}}/invoice_product/create">Agregar Producto</a>
          </div>              
          @endsection
          