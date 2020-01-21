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

    <div class="content-form">
        <div class="board-form">
            <div class="content-title">
                <div class="title">
                    <h1>EDITAR VENDEDOR</h1>
                </div>
            </div>
            <form class="form" action=" {{route('seller.update', $seller)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="items-form">
                    <label for="">Id:</label>
                    <input type="text" name="id" id="" value="{{$seller->id}}">
                    <label for="">Nombre:</label>
                    <input type="text" name="first_name" id="" value="{{$seller->first_name}}">
                    <label for="">Apellido:</label>
                    <input type="text" name="last_name" id="" value="{{$seller->last_name}}">
                    <label for="">email:</label>
                    <input type="text" name="email" id="" value="{{$seller->email}}">
                    <label for="">Número Telefono:</label>
                    <input type="text" name="phone_number" id="" value="{{$seller->phone_number}}">
                    <br>
                    <button class="button" type="submit">Editar</button>
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
