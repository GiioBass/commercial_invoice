@extends('template')
@section('content')

<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>EDITAR FACTURA</h1>
</div>
@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('update_invoice', $invoice->id)}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @method('PUT')
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{$invoice->id}}">
        <p>Fecha de Expedición</p>
        <input type="text" name="expedition_date" id="" value="{{$invoice->expedition_date}}">
        <p>Fecha de Expiración</p>
        <input type="text" name="expiration_date" id="" value="{{$invoice->expiration_date}}">
        <p>iva</p>
        <input type="text" name="iva" id="" value="{{$invoice->iva}}">
        <p>Total</p>
        <input type="text" name="total" id="" value="{{$invoice->total}}">
        <p>vendedor</p>
        <input type="text" name="sellers_id" id="" value="{{$invoice->sellers_id}}">
        <p>cliente</p>
        <input type="text" name="clients_id" id="" value="{{$invoice->clients_id}}">
        <br>
        <button type="submit">Editar</button>
    </form>
    <a href="{{route('description_invoice', $invoice)}}">Atras</a>


@endsection