@extends('template')
@section('content')

<div class="title" style="width: 30%; margin:50px auto;  text-align:center ">
    <h1>DETALLES DE LA FACTURA</h1>
</div>
<div class="content" style="width:50%; margin: 0px auto; font-size: 20px">
    <ul>
        <li> {{$invoice->id}}</li>
        <li> {{$invoice->expedition_date}}</li>
        <li> {{$invoice->expiration_date}}</li>
        <li> {{$invoice->iva}}</li>
        <li> {{$invoice->created_at}}</li>
        <li> {{$invoice->sellers_id}}</li>
        <li> {{$invoice->clients_id}}</li>
    </ul>
    <a href="{{route('edit_invoice', $invoice)}}">Editar</a>
</div>
<form  action="{{route('delete_invoice', $invoice)}}" method="POST">
    @method('DELETE')
    @csrf
    <button style="display: block; text-decoration: none;" type="submit">Eliminar Factura</button>
</form>
@endsection