@extends('template')
@section('content')

    <div class="container-menu">
        @can('seller.create')
            <div class="container-item">
                <a class="item-menu" href="{{route('seller.create')}}">
                    <div class="item-button">
                        Añadir Vendedor
                    </div>
                </a>
            </div>
        @endcan
    </div>
    <div>
        <form class="form" action="/seller" method="get">
            <div class="items-form">
                <label for="">
                    <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                    Buscar:
                </label>
                <validation-provider rules="number" v-slot="v">
                    <input v-model="value" type="search" name="id" id="" placeholder="Id Vendedor {{$id}}">
                    <span class="validate-input">@{{ v.errors[0] }}</span>
                </validation-provider>

                <button class="button" type="submit">Buscar</button>
            </div>
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
                    @can('seller.edit')
                        <th>Editar</th>
                    @endcan
                    @can('seller.delete')
                        <th>Eliminar</th>
                    @endcan
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
                        @can('seller.edit')
                            <td>
                                <a href="{{route('seller.edit', $seller->id)}}">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                        @endcan
                        @can('seller.delete')
                            <td>
                                <a href="{{route('seller.delete',$seller->id)}}">
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
        {{$sellers->links()}}
    </div>
    @can('seller.export')
        <div class="container-menu">
            <div class="container-item">
                <a class="item-menu" href="{{route('seller.export')}}">
                    <div class="item-button">
                        Exportar
                    </div>
                </a>
            </div>
        </div>
    @endcan
    @can('seller.import')
        <div>
            <form class="form" action="{{route('seller.import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="items-form">
                    <input type="file" name="file" id="">
                    <button class="button" type="submit">Importar</button>
                </div>
            </form>
        </div>
    @endcan
@endsection
