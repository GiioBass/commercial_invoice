@extends('template')
@section('content')
@include('styles')



<div style="text-align:center; margin:10px">
    <a href="{{route('product.create')}}">Añadir Producto</a>
</div>

<div>
    <table>
        <tr>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Valor Unidad</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($products as $product)
            <div style="width:50%; margin: 0px auto; font-size: 20px">
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->unit_value}}</td>
                    <td><a href="/product/{{$product->id}}/edit">Editar</a></td>
                    <td><a href="/product/{{$product->id}}/confirmDelete">Eliminar</a></td>
                    <br>
                </tr>
            </div>
        @endforeach()
    </table>
</div>

@endsection