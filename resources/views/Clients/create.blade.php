@extends('template')
@section('content')
{{--            --}}
@if(session('message'))
{{session('message')}}
@endif
{{--            --}}

    <div class="content-form">
        <div class="board-form">
            <div class="content-title">
                <div class="title">
                    <h1>AÑADIR CLIENTE</h1>
                </div>
            </div>            
                <form class="form" action=" {{route('client.store')}}" method="POST" >
                    @csrf
                    @if($errors->any())
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="items-form">
                        <label for="">Id</label>
                        <input type="text" name="id" id="" style="text-align:center" value="{{old('id')}}">
                        <label for="">Nombre</label>
                        <input type="text" name="first_name" id="" value="{{old('first_name')}}">
                        <label for="">Apellido</label>
                        <input type="text" name="last_name" id="" value="{{old('last_name')}}">
                        <label for="">Telefono</label>
                        <input type="text" name="phone_number" id="" value="{{old('phone_number')}}">
                        <label for="">Direccion</label>
                        <input type="text" name="address" id="" value="{{old('address')}}">
                        <br>
                        <button class="button" type="submit">Guardar</button>
                    </div>
                </form>
            <a href="{{route('client.index')}}">Atras</a>
        </div>
    </div>
@endSection