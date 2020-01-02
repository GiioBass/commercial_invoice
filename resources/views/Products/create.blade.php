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
                    <h1>AÑADIR PRODUCTO</h1>
                </div>
            </div>

            <form class="form" action=" {{route('product.store')}}" method="POST" >
                @csrf
                <div class="items-form">
                    <label for="">Id</label>
                    <input type="text" name="id" id=""  value="{{old('id')}}">
                    <label for="">Nombre</label>
                    <input type="text" name="name" id="" value="{{old('name')}}">
                    <label for="">Descripción</label>
                    <input type="text" name="description" id="" value="{{old('description')}}">
                    <label for="">Valor</label>
                    <input type="text" name="unit_value" id="" value="{{old('unit_value')}}">
                    <br>
                    <button class="button" type="submit">Guardar</button>
                </div>
            </form>
            <a class="item-menu" href="{{route('product.index')}}">
                <div class="item-button">
                    Atras        
                </div> 
            </a>
        </div>
    </div>

@endSection