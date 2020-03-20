@extends('template')
@section('content')
    {{--TODO provisional--}}
    @php

    @endphp
    @can('client.create')
        <div class="container-menu">
            <div class="container-item">
                <a class="item-menu" href="{{route('client.create')}}">
                    <div class="item-button">
                        Añadir Cliente
                    </div>
                </a>
            </div>
        </div>
    @endcan
    <form class="form" action="/client" method="get">
        <div class="items-form">

            <label for="">
                <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                Buscar:
            </label>
            <validation-provider rules="number" v-slot="v">
                <input v-model="value" type="text" name="id" id="" placeholder="Id Cliente {{$id}}" >
                <span class="validate-input">@{{ v.errors[0] }}</span>
            </validation-provider>
            <button class="button" type="submit">Buscar</button>
        </div>
    </form>

    <div>
        <table>
            <div>
                <tr>
                    <th>Identificación</th>
                    <th>Tipo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Número Tel</th>
                    <th>e-mail</th>
                    <th>Dirección</th>
                    @can('client.edit')
                    <th>Editar</th>
                    @endcan
                    @can('client.delete')
                        <th>Eliminar</th>
                    @endcan
                </tr>
            </div>
            @foreach($clients as $client)

                <tr>
                    <td>{{number_format($client->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                    <td>{{$client->document_type->documentName}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->phone_number}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->address}}</td>

                    @can('client.edit')
                        <td>
                            <a href="{{route('client.edit', $client->id)}}">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                    @endcan
                    @can('client.delete')
                        <td>
                            <a href="{{route('client.delete', $client->id)}}">
                                <i class="material-icons">delete_outline</i>
                            </a>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container-pagination">
        {{ $clients->appends($_GET)->links() }}
    </div>
    @can('client.export')
        <div class="container-menu">
            <div class="container-item">
                <a class="item-menu" href="{{route('client.export')}}">
                    <div class="item-button">
                        Exportar
                    </div>
                </a>
            </div>
        </div>
    @endcan
    @can('client.import')
        <div>

            <form class="form" action="{{route('client.import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="items-form">

                    <input type="file" name="file" id="">
                    <button class="button" type="submit">Importar</button>
                </div>
            </form>
        </div>
    @endcan
@endsection
