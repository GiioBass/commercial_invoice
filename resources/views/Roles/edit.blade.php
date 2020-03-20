@extends('template')
@section('content')


    @if(session('message'))
        <div>{{session('message')}}</div>
    @endif
    <div class="content-errors">
        <div class="errors">
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="content-form" style="height: 80em">
        <div class="board-form" style="height: 100%">
            <div class="content-title">
                <div class="title">
                    <h1>EDITAR ROL </h1>
                </div>
            </div>
            @can('role.update')
                {!! Form::model($role, ['route' => ['role.update', $role->id],
                        'method' => 'PUT']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Nombre de la etiqueta') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'URL Amigable') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Descripción') }}
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                </div>
                <hr>
                          {{--  <h3>Permiso especial</h3>
                            <div class="form-group">
                                <label>{{ Form::checkbox('special', 'all-access', null) }} Acceso total</label>
                                <label>{{ Form::checkbox('special', 'no-access', null) }} Ningún acceso</label>
                            </div>--}}
                <hr>
                <h3>Lista de permisos</h3>
                <div class="form-group">
                    <ul class="list-unstyled">
                        @foreach($permissions as $permission)
                            <li>
                                <label>
                                    {{ Form::checkbox('permissions[]', $permission->id, null) }}
                                    {{ $permission->name }}
                                    <em>({{ $permission->description }})</em>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                </div>

                {{ Form::close() }}
            @endcan
            <a class="item-menu" href="{{route('user.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>
@endsection
