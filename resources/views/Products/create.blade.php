@extends('template')

@section('content')

<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>AÑADIR PRODUCTO</h1>
</div>
@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('product.store')}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id=""  value="{{old('id')}}">
        <p>Nombre</p>
        <input type="text" name="name" id="">
        <p>Descripcion</p>
        <input type="text" name="description" id="">
        <p>Valor </p>
        <input type="text" name="unit_value" id="">
        <br>
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
    <a href="{{route('product.index')}}">Atras</a>
</div>


@endSection