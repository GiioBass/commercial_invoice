@extends('template')

@section('content')
<h1>MODULO CLIENTES</h1>

<form action="" method="get">
    <p>ID</p>
    <input type="number" name="id" id="">
    <p>Nombres</p>
    <input type="text" name="first_name" id="">
    <p>Apellidos</p>
    <input type="text" name="last_name" id="">
    <p>Número Telefono</p>
    <input type="number" name="phone_number" id="">
    <p>Dirección</p>
    <input type="text" name="address" id="">
    <br>
    <input type="submit" value="Guardar">
</form>

@foreach($clients as $client)
    <tr>
        <td>{{$client->id}}</td>
        <td>{{$client->first_name}}</td>
        <td>{{$client->last_name}}</td>
        <td>{{$client->phone_number}}</td>
        <td>{{$client->address}}</td>
        <td>{{$client->address}}</td>
        
        <br>
    </tr>
@endforeach()

@endsection