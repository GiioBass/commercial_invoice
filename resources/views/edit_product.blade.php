@extends('template')
@section('content')
<h1>Editar Producto {{$product->name}}</h1>

@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('update_product', $product->id)}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @method('PUT')
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{$product->id}}">
        <p>Nombre</p>
        <input type="text" name="name" id="" value="{{$product->name}}">
        <p>Descripcion</p>
        <input type="text" name="description" id="" value="{{$product->description}}">
        <p>Valor Unidad</p>
        <input type="text" name="unit_value" id="" value="{{$product->unit_value}}">
        <br>
        <button type="submit">Editar</button>
    </form>
    <a href="{{route('description_product', $product)}}">Atras</a>
</div>
@endsection