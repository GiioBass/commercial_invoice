@extends('template')
@section('content')
    {{--TODO provisional--}}

    <div>
        <div>
            <h1>Usuarios</h1>
        </div>
    </div>
    {{--    <form class="form" action="/user" method="get">
            <div class="items-form">

                <label for="">
                    <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                    Buscar:
                </label>
                <validation-provider rules="number" v-slot="v">
                    <input v-model="value" type="text" name="id" id="" placeholder="Id usere" value="">
                    <span class="validate-input">@{{ v.errors[0] }}</span>
                </validation-provider>
                <button class="button" type="submit">Buscar</button>
            </div>
        </form>--}}

    <div>
        <table>
            <div>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    @can('user.edit')
                        <th>Editar</th>
                    @endcan
                    @can('user.delete')
                        <th>Eliminar</th>
                    @endcan
                </tr>
            </div>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    @can('user.edit')
                        <td>
                            <a href="{{route('user.edit', $user->id)}}">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                    @endcan
                    @can('user.destroy')
                        <td width="10px">
                            {!! Form::open(['route' => ['user.destroy', $user->id],
                            'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                            {!! Form::close() !!}
                        </td>
                    @endcan
                </tr>

            @endforeach
        </table>
    </div>
    <div class="container-pagination">
        {{$users->links()}}
    </div>

@endsection
