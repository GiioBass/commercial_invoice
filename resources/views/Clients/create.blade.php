@extends('template')
@section('content')
{{--TODO provisional--}}
@php
    $documentType = App\DocumentType::all();
@endphp

    {{--            --}}
    @if(session('message'))
        {{session('message')}}
    @endif
    {{--            --}}
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
                    <h1>AÑADIR CLIENTE</h1>
                </div>
            </div>

            <form class="form" action=" {{route('client.store')}}" method="POST">
                @csrf
                <div class="items-form">
                    <label for="">Id</label>
                    <input type="text" name="id" id="" value="{{old('id')}}">
                    <label for="">Tipo</label>
                    <div class="list">
                        <select class="list-select" name="document_type_id" id="">
                            @foreach ($documentType as $documentTypes)
                                <option value="{{$documentTypes->id}}">
                                    {{$documentTypes->documentName}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <label for="">Nombre</label>

                    <input type="text" name="first_name" id="" value="{{old('first_name')}}">

                    <label for="">Apellido</label>
                    <input type="text" name="last_name" id="" value="{{old('last_name')}}">
                    <label for="">Telefono</label>
                    <input type="text" name="phone_number" id="" value="{{old('phone_number')}}">
                    <label for="">e-mail</label>
                    <input type="text" name="email" id="" value="{{old('email')}}">
                    <label for="">Direccion</label>
                    <input type="text" name="address" id="" value="{{old('address')}}">
                    <br>
                    <button class="button" type="submit">Guardar</button>
                </div>
            </form>
            <a class="item-menu" href="{{route('client.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>
@endSection
