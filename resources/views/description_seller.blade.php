@extends('template')
@section('content')
<div class="title" style="width: 30%; margin:50px auto;  text-align:center ">
    <h1>Descripcion Vendedor</h1>
</div>
<div class="content" style="width:50%; margin: 0px auto; font-size: 20px">
    <ul>
        <li>ID: {{$seller->id}}</li>
        <li>Nombres: {{$seller->first_name}}</li>
        <li>Apellidos: {{$seller->last_name}}</li>
        <li>Email: {{$seller->email}}</li>
        <li>Telefono: {{$seller->phone_number}}</li>
    </ul>
    <a href="{{route('edit_seller', $seller)}}">Editar</a>
</div>
<form  action="{{route('delete_seller', $seller)}}" method="POST">
    @method('DELETE')
    @csrf
    <button style="display: block; text-decoration: none;" type="submit">Eliminar Cliente</button>
</form>


@endsection