@extends('template')
@section('content')


<div class="container-menu">
    <div class="container-item">
        <a  class="item-menu" href="{{route('product.create')}}">
            <div class="item-button">
                Añadir Producto
            </div>  
        </a>
    </div>
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
                    
                </tr>
            </div>
        @endforeach()
    </table>
</div>
<div class="container-pagination">
    {{$products->links()}}
</div>

<div>
    <a href="/products/export">Export</a>
</div>

<form action="/products/import" method="post" enctype="multipart/form-data" >
@csrf
<input type="file" name="file" id="">
<button type="submit">Importar</button>
</form>
@endsection