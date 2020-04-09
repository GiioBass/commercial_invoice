@extends('template')
@section('content')
    {{--TODO provisional--}}

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

    <div class="content-form">
        <div class="board-form">
            <div class="content-title">
                <div class="title">
                    <h1>EDITAR USUARIO {{$user->name}}</h1>
                </div>
            </div>
            @can('user.edit')
                {!! Form::model($user, ['route' => ['user.update', $user->id],
                  'method' => 'PUT']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
                <hr>
                <h3>Lista de roles</h3>
                <div class="form-group">
                    <ul class="list-unstyled">
                        @foreach($roles as $role)
                            <li>
                                <label>
                                    {{ Form::checkbox('roles[]', $role->id, null) }}
                                    {{ $role->name }}
                                    <em>({{ $role->description }})</em>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                </div>
                {!! Form::close() !!}
                <br>
                <br>
                <div id="app">
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            @endcan
            <a class="item-menu" href="{{route('user.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>
    script src="{{asset('js/app.js')}}"></script>
@endsection
