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
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>ID</p>
        <input type="text" name="id" id=""  value="{{old('id')}}">
        <p>Nombre</p>
        <input type="text" name="name" id="" value="{{old('name')}}">
        <p>Descripcion</p>
        <input type="text" name="description" id="" value="{{old('description')}}">
        <p>Valor </p>
        <input type="text" name="unit_value" id="" value="{{old('unit_value')}}">
        <br>
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
    <a href="{{route('product.index')}}">Atras</a>
</div>


@endSection