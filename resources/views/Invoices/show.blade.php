@extends('template')
@section('content')

<div style="text-align: center">
  <h1>Productos para la Factura {{$invoices->id}}</h1>
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
<table style="margin: auto">
    <h3 style="text-align: center">Detalles</h3>
      <tr>
        <td>Id:</td>
        <td>Nombre:</td>
        <td>Descripción:</td>
        <td>Valor unidad:</td>
        <td>Fecha Creación:</td>
        <td>Fecha Actualización:</td>
      </tr>
      @foreach ($invoices->products as $product)
        <tr style="text-align: center">
          <td >{{$product->id}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->unit_value}}</td>
          <td>{{$product->create_at}}</td>
          <td>{{$product->update_at}}</td>
          
        </tr>
          
      @endforeach
      
    </table>
    <div style="margin: 50px 350px">
      <a href="{{route('invoice.index')}}">Atras</a>
    <div>
    <div>
      <a href="/invoice/{{$invoices->id}}/invoice_product/create">Agregar Producto</a>
    </div>    
@endsection
