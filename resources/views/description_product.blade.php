@extends('template')
@section('content')
<div class="title" style="width: 30%; margin:50px auto;  text-align:center ">
    <h1>DESCRIPCIÓN DEL PRODUCTO {{$product->name}}</h1>
</div>
<div class="content" style="width:50%; margin: 0px auto; font-size: 20px">
    <ul>
        <li>ID: {{$product->id}}</li>
        <li>Nombre: {{$product->name}}</li>
        <li>Descripcion: {{$product->description}}</li>
        <li>Valor Unidad: {{$product->unit_value}}</li>
    </ul>
    <a href="{{route('edit_product', $product)}}">Editar</a>
</div>
<form  action="{{route('delete_product', $product)}}" method="POST">
    @method('DELETE')
    @csrf
    <button style="display: block; text-decoration: none;" type="submit">Eliminar Cliente</button>
</form>
@endsection