@extends('template')
@section('content')

    <div class="container-menu">
        <div class="container-item">
            <a  class="item-menu" href="{{route('seller.create')}}">
                <div class="item-button">
                    Añadir Vendedor
                </div>  
            </a>
        </div>
    </div>

    <div>
        <table>
            <div>
                <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Número Tel</th>
                    <th></th>
                    <th></th>
                </tr>
            </div>
            @foreach($sellers as $seller)
                <div>
                    <tr>            
                        <td>{{$seller->id}}</td>
                        <td>{{$seller->first_name}}</td>
                        <td>{{$seller->last_name}}</td>
                        <td>{{$seller->email}}</td>
                        <td>{{$seller->phone_number}}</td>
                        <td><a href="/seller/{{$seller->id}}/edit">Editar</a></td>
                        <td><a href="/seller/{{$seller->id}}/confirmDelete">Eliminar</a></td>
                        
                    </tr>
                </div>
            @endforeach()

        </table>
    </div>
<div class="container-pagination">
    {{$sellers->links()}}
</div>

<div>
    <a href="/sellers/export">Export</a>
</div>

<form action="/sellers/import" method="post" enctype="multipart/form-data" >
@csrf
<input type="file" name="file" id="">
<button type="submit">Importar</button>
</form>
@endsection