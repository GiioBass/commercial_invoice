@extends('template')
@section('content')

<div class="title" style="width: 30%; margin:50px auto;  text-align:center ">
    <h1>DETALLES DEL CLIENTE</h1>
</div>
<div class="content" style="width:50%; margin: 0px auto; font-size: 20px">
    <ul>
        <li>ID: {{$client->id}}</li>
        <li>Nombres: {{$client->first_name}}</li>
        <li>Apellidos: {{$client->last_name}}</li>
        <li>Telefono: {{$client->phone_number}}</li>
        <li>Direccion: {{$client->address}}</li>
    </ul>
    <a href="{{route('edit_client', $client)}}">Editar</a>
</div>
<form  action="{{route('delete_client', $client)}}" method="POST">
    @method('DELETE')
    @csrf
    <button style="display: block; text-decoration: none;" type="submit">Eliminar Cliente</button>
</form>
@endsection