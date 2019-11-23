@extends('template')
@section('content')

<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>EDITAR VENDEDOR</h1>
</div>
@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('update_seller', $seller->id)}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @method('PUT')
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{$seller->id}}">
        <p>Nombres</p>
        <input type="text" name="first_name" id="" value="{{$seller->first_name}}">
        <p>Apellidos</p>
        <input type="text" name="last_name" id="" value="{{$seller->last_name}}">
        <p>Dirección</p>
        <input type="text" name="email" id="" value="{{$seller->email}}">
        <p>Número Telefono</p>
        <input type="text" name="phone_number" id="" value="{{$seller->phone_number}}">
        <br>
        <button type="submit">Editar</button>
    </form>
    <a href="{{route('description_seller', $seller)}}">Atras</a>


@endsection