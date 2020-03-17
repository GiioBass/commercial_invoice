@extends('template')
@section('content')
    {{--TODO provisional--}}

    <div>
        <div>
            <h1>Roles</h1>
        </div>
    </div>
    {{--    <form class="form" action="/role" method="get">
            <div class="items-form">

                <label for="">
                    <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                    Buscar:
                </label>
                <validation-provider rules="number" v-slot="v">
                    <input v-model="value" type="text" name="id" id="" placeholder="Id rolee" value="">
                    <span class="validate-input">@{{ v.errors[0] }}</span>
                </validation-provider>
                <button class="button" type="submit">Buscar</button>
            </div>
        </form>--}}
    <div class="container-menu">
        @can('role.create')
            <div class="container-item">
                <a class="item-menu" href="{{route('role.create')}}">
                    <div class="item-button">
                        Añadir Rol
                    </div>
                </a>
            </div>
        @endcan
    </div>
    <div>
        <table>
            <div>
                <tr>
                    <th>Id</th>
                    <th>Rol</th>
                    @can('role.edit')
                        <th>Editar</th>
                    @endcan
                    @can('role.delete')
                        <th>Eliminar</th>
                    @endcan
                </tr>
            </div>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    @can('role.edit')
                        <td>
                            <a href="{{route('role.edit', $role->id)}}">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                    @endcan
                    @can('role.destroy')
                        <td width="10px">
                            {!! Form::open(['route' => ['role.destroy', $role->id],
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
        {{$roles->links()}}
    </div>

@endsection
