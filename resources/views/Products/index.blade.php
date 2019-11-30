@extends('template')
@section('content')
<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO DE PRODUCTOS</h1>
</div>

@foreach($products as $product)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>* {{$product->id}} - </td>
            <td>{{$product->name}} - </td>
            <td>{{$product->description}} - </td>
            <td>{{$product->unit_value}}  </td>
            <td><a href="/product/{{$product->id}}/edit">Editar /</a></td>
            <td><a href="/product/{{$product->id}}/confirmDelete">Eliminar</a></td>
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
<a href="{{route('product.create')}}">Añadir Nuevo Producto</a>
</div>

@endsection