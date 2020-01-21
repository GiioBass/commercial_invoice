@extends('template')
@section('content')

    @if(session('message'))
        {{session('message')}}
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
                    <h1>AÑADIR VENDEDOR</h1>
                </div>
            </div>
            <form class="form" action=" {{route('seller.store')}} " method="POST">
            @csrf
            <div class="items-form">
                <label for="">id</label>
                <input type="text" name="id" id="" value="{{old('id')}}">
                <label for="">Nombre</label>
                <input type="text" name="first_name" id="" value="{{old('first_name')}}">
                <label for="">Apellido</label>
                <input type="text" name="last_name" id="" value="{{old('last_name')}}">
                <label for="">Email</label>
                <input type="text" name="email" id="" value="{{old('email')}}">
                <label for="">Telefono</label>
                <input type="text" name="phone_number" id="" value="{{old('phone_number')}}">
                <br>
                <button class="button" type="submit">Guardar</button>
            </div>
            </form>
            <a class="item-menu" href="{{route('seller.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>

@endsection
