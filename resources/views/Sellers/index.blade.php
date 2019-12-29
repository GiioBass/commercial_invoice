@extends('template')
@section('content')
@include('styles')



    <div style="text-align:center; margin:50px">
        <a href="{{route('seller.create')}}">Añadir Vendedor</a>
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

@endsection