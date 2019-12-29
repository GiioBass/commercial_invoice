@extends('template')

@include('styles')
@section('content')




<div style="text-align:center; margin:10px">
    <a href="{{route('client.create')}}">Añadir Cliente</a>
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
@endsection