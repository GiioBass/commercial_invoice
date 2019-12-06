@extends('template')

@section('content')
<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO CLIENTES</h1>
</div>

@foreach($clients as $client)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                   
            </td>
            <td> * {{$client->id}} - </td>
            <td>{{$client->first_name}} - </td>
            <td>{{$client->last_name}} - </td>
            <td>{{$client->phone_number}} - </td>
            <td>{{$client->address}}  -   </td>
            <td><a href="/client/{{$client->id}}/edit">Editar /</a></td>
            <td><a href="/client/{{$client->id}}/confirmDelete">Eliminar</a></td>
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
    <a href="{{route('client.create')}}">Añadir Nuevo Cliente</a>
</div>
<div class="container-pagination">
    
       
   
</div>
@endsection