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
        <form action="/seller" method="get">
            <label for="">Buscar:</label>
            <input type="search" name="id" id="" placeholder="Id Vendedor">
            <button type="submit">Buscar</button>
        </form>

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
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </div>
            @foreach($sellers as $seller)
                <div>
                    <tr>            
                        <td>{{number_format($seller->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                        <td>{{$seller->first_name}}</td>
                        <td>{{$seller->last_name}}</td>
                        <td>{{$seller->email}}</td>
                        <td>{{$seller->phone_number}}</td>
                        <td>
                            <a href="/seller/{{$seller->id}}/edit">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                        <td>
                            <a href="/seller/{{$seller->id}}/confirmDelete">
                                <i class="material-icons">delete_outline</i>
                            </a>
                        </td>
                        
                    </tr>
                </div>
            @endforeach()

        </table>
    </div>
<div class="container-pagination">
    {{$sellers->links()}}
</div>
<div class="container-menu">
    <div class="container-item">
        <a  class="item-menu" href="/sellers/export">
            <div class="item-button">
                Exportar
            </div>  
        </a>
    </div>
</div>

<form action="/sellers/import" method="post" enctype="multipart/form-data" >
@csrf
<input type="file" name="file" id="">
<button type="submit">Importar</button>
</form>
@endsection