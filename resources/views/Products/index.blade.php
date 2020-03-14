@extends('template')
@section('content')


    <div class="container-menu">
        @can('product.create')
            <div class="container-item">
                <a class="item-menu" href="{{route('product.create')}}">
                    <div class="item-button">
                        Añadir Producto
                    </div>
                </a>
            </div>
        @endcan
    </div>
    <div>
        <form class="form" action="/product" method="get">
            <div class="items-form">

                <label for="">
                    <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                    Buscar:
                </label>
                <validation-provider rules="number" v-slot="v">
                    <input v-model="value" type="text" name="id" id="" placeholder="Id Producto {{$id}}" value="">
                    <span class="validate-input">@{{ v.errors[0] }}</span>
                </validation-provider>

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
                @can('product.edit')
                    <th>Editar</th>
                @endcan
                @can('product.delete')
                    <th>Eliminar</th>
                @endcan
            </tr>
            @foreach($products as $product)
                <div>
                    <tr>
                        <td>{{number_format($product->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>


                        <td>{{$product->unit_value}}</td>
                        @can('product.edit')
                            <td>
                                <a href="{{route('product.edit', $product->id)}}">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                        @endcan
                        @can('product.delete')
                            <td>
                                <a href="{{route('product.delete', $product->id)}}">
                                    <i class="material-icons">delete_outline</i>
                                </a>
                            </td>
                        @endcan
                    </tr>
                </div>
            @endforeach()
        </table>
    </div>

    <div class="container-pagination">
        {{$products->appends($_GET)->links()}}
    </div>

    @can('product.export')
        <div class="container-menu">
            <div class="container-item">
                <a class="item-menu" href="{{route('product.export')}}">
                    <div class="item-button">
                        Export
                    </div>
                </a>
            </div>
        </div>
    @endcan
    @can('product.import')
        <div>
            <form class="form" action="{{route('product.import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="items-form">
                    <input type="file" name="file" id="">
                    <button class="button" type="submit">Importar</button>
                </div>
            </form>
        </div>
    @endcan
@endsection
