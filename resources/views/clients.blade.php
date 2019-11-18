@extends('template')

@section('content')
<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO CLIENTES</h1>
</div>

<!--
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
-->
@foreach($clients as $client)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                <a href="{{route('description', $client)}}" style="font-size: 18px">
                    {{$client->id}} - </td>
                </a>    
            <td>{{$client->first_name}}</td>
            <td>{{$client->last_name}} - </td>
            <td>{{$client->phone_number}} - </td>
            <td>{{$client->address}}</td>
            <br>
        </tr>
    </div>
@endforeach()

@endsection