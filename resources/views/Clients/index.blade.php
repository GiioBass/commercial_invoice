@extends('template')
@section('content')

<div class="container-menu">
    <div class="container-item">
        <a  class="item-menu" href="{{route('client.create')}}">
            <div class="item-button">
                Añadir Cliente
            </div>  
        </a>
    </div>
</div>

<div>
    <table>
        <div>
            <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Número Tel</th>
                <th>Dirección</th>
                <th></th>
                <th></th>
            </tr>
        </div>
        @foreach($clients as $client)
                  
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->phone_number}}</td>
                    <td>{{$client->address}}</td>
                    <td><a href="/client/{{$client->id}}/edit">Editar</a></td>
                    <td><a href="/client/{{$client->id}}/confirmDelete">Eliminar</a></td>
                    
                </tr>
            
        @endforeach
    </table>
</div>
<div class="container-pagination">
    {{$clients->links()}}
</div>

<div>
    <a href="/clients/export">Export</a>
</div>

<form action="/clients/import" method="post" enctype="multipart/form-data" >
@csrf
<input type="file" name="file" id="">
<button type="submit">Importar</button>
</form>
@endsection