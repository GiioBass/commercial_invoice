@extends('template')

@section('content')


<h1>Editar Cliente {{$client->first_name}}</h1>
@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style="background-color:aquamarine; width:60%; margin: auto; ">
    <form action=" {{route('update_client', $client->id)}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @method('PUT')
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{$client->id}}">
        <p>Nombres</p>
        <input type="text" name="first_name" id="" value="{{$client->first_name}}">
        <p>Apellidos</p>
        <input type="text" name="last_name" id="" value="{{$client->last_name}}">
        <p>Número Telefono</p>
        <input type="text" name="phone_number" id="" value="{{$client->phone_number}}">
        <p>Dirección</p>
        <input type="text" name="address" id="" value="{{$client->address}}">
        <br>
        <button type="submit">Editar</button>
    </form>
    <a href="{{route('description', $client)}}">Atras</a>
</div>

@endsection