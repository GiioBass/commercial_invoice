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
    <form  class="form" action="/product" method="get">
        <div class="items-form">

            <label for="">
                <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                Buscar:
            </label>
            <input type="search" name="id" id="" placeholder="Id Producto">
            <button class="button" type="submit">Buscar</button>
        </div>
    </form>
</div>
<div>
    <table>
        <tr>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Valor Unidad</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach($products as $product)
            <div >
                <tr>
                    <td>{{number_format($product->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>


                    <td>{{$product->unit_value}}</td>

                     <td>
                        <a href="/product/{{$product->id}}/edit">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="/product/{{$product->id}}/confirmDelete">
                            <i class="material-icons">delete_outline</i>
                        </a>
                    </td>
                </tr>
            </div>
        @endforeach()
    </table>
</div>

<div class="container-pagination">
    {{$products->appends($_GET)->links()}}
</div>

<div class="container-menu">
    <div class="container-item">
        <a class="item-menu" href="/products/export">
            <div class="item-button">
                Export
            </div>
        </a>
    </div>
</div>
<div>
    <form class="form" action="/products/import" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="items-form">
            <input type="file" name="file" id="">
            <button class="button" type="submit">Importar</button>
        </div>
    </form>
</div>
@endsection