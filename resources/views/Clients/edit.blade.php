@extends('template')

@section('content')


<h1>Editar Cliente {{$client->first_name}}</h1>
@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style=" width:60%; margin: auto; ">
    <form action="{{route('client.update', $client)}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{number_format($client->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}">
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
    <a href="{{route('client.index')}}">Atras</a>
</div>

@endsection