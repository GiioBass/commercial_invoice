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
                    <h1>EDITAR PRODUCTO {{$product->name}}</h1>
                </div>
            </div>
            <form class="form" action=" {{route('product.update', $product)}} " method="POST">
                @csrf
                @method('PUT')
                <div class="items-form">

                    <label for="">Id:</label>
                    <input type="text" name="id" id="" value="{{$product->id}}">
                    <label for="">Nombre:</label>
                    <input type="text" name="name" id="" value="{{$product->name}}">
                    <label for="">Descripción:</label>
                    <input type="text" name="description" id="" value="{{$product->description}}">
                    <label for="">Valor Unidad:</label>
                    <input type="text" name="unit_value" id="" value="{{$product->unit_value}}">
                    <br>
                    <button class="button" type="submit">Editar</button>
                </div>
            </form>
            <a class="item-menu" href="{{route('product.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>
@endsection
