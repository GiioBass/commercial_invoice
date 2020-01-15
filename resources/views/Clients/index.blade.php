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
    <form class="form" action="/client" method="get">
        <div class="items-form">
            
            <label for="">
                <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                Buscar:
            </label>
            <input type="search" name="id" id="" placeholder="Id Cliente" >
            <button class="button" type="submit">Buscar</button>
        </div>
    </form>
<div>
    <table>
        <div>
            <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Número Tel</th>
                <th>Dirección</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </div>
        @foreach($clients as $client)
                  
                <tr>
                    <td>{{number_format($client->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->phone_number}}</td>
                    <td>{{$client->address}}</td>
                    <td>
                        <a href="/client/{{$client->id}}/edit">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="/client/{{$client->id}}/confirmDelete">
                            <i class="material-icons">delete_outline</i>
                        </a>
                    </td>
                    
                </tr>
            
        @endforeach
    </table>
</div>
<div class="container-pagination">
    {{$clients->links()}}
</div>
<div class="container-menu">
    <div class="container-item">
        <a  class="item-menu" href="/clients/export">
            <div class="item-button">
                Exportar
            </div>  
        </a>
    </div>
</div>
<div>

    <form class="form" action="/clients/import" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="items-form">
            
            <input type="file" name="file" id="">
            <button class="button" type="submit">Importar</button>
        </div>
    </form>
</div>
@endsection