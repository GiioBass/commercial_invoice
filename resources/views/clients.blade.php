@extends('template')

@section('content')
<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO CLIENTES</h1>
</div>

@foreach($clients ?? '' as $client)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                <a href="{{route('description', $client)}}" style="font-size: 18px ; color: #1f00ff ;">
                    Ver 
                </a>    
            </td>
            <td>- {{$client->id}} - </td>
            <td>{{$client->first_name}} -</td>
            <td>{{$client->last_name}}  </td>
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
    <a href="{{route('add_client')}}">Añadir Nuevo Cliente</a>
</div>
<div class="container-pagination">
    
        {{$clients->links()}}
   
</div>
@endsection