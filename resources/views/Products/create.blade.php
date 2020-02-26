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

            <form class="form" action=" {{route('product.store')}}" method="POST">
                @csrf
                <div class="items-form">
                    <label for="">Id</label>
                    <validation-provider rules="required|number" v-slot="v">
                        <span class="validate-input">@{{ v.errors[0] }}</span>
                        <input v-model="value" type="text" name="id" id=""
                               value="{{old('id')}}">
                    </validation-provider>


                    <label for="">Nombre</label>
                    <validation-provider rules="required" v-slot="v">
                        <span class="validate-input">@{{ v.errors[0] }}</span>
                        <input v-model="value" type="text" name="name" id="" value="{{old('name')}}">
                    </validation-provider>

                    <label for="">Descripción</label>
                    <validation-provider rules="required" v-slot="v">
                        <span class="validate-input">@{{ v.errors[0] }}</span>
                        <input v-model="value" type="text" name="description" id="" value="{{old('description')}}">
                    </validation-provider>

                    <label for="">Valor</label>
                    <validation-provider rules="required|number" v-slot="v">
                        <span class="validate-input">@{{ v.errors[0] }}</span>
                        <input v-model="value" type="text" name="unit_value" id="" value="{{old('unit_value')}}">
                    </validation-provider>

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
