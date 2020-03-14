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
            @can('seller.create')
                <form class="form" action=" {{route('seller.store')}} " method="POST">
                    @csrf
                    <div class="items-form">
                        <label for="">id</label>
                        <validation-provider rules="required|number" v-slot="v">
                            <span class="validate-input">@{{ v.errors[0] }}</span>
                            <input v-model="value" type="text" name="id" id="" value="{{old('id')}}">
                        </validation-provider>

                        <label for="">Nombre</label>
                        <validation-provider rules="required" v-slot="v">
                            <span class="validate-input">@{{ v.errors[0] }}</span>
                            <input v-model="value" type="text" name="first_name" id="" value="{{old('first_name')}}">
                        </validation-provider>

                        <label for="">Apellido</label>
                        <validation-provider rules="required" v-slot="v">
                            <span class="validate-input">@{{ v.errors[0] }}</span>
                            <input v-model="value" type="text" name="last_name" id="" value="{{old('last_name')}}">
                        </validation-provider>

                        <label for="">Email</label>
                        <validation-provider rules="required|email" v-slot="v">
                            <span class="validate-input">@{{ v.errors[0] }}</span>
                            <input v-model="value" type="text" name="email" id="" value="{{old('email')}}">
                        </validation-provider>

                        <label for="">Telefono</label>
                        <validation-provider rules="required|number" v-slot="v">
                            <span class="validate-input">@{{ v.errors[0] }}</span>
                            <input v-model="value" type="text" name="phone_number" id=""
                                   value="{{old('phone_number')}}">
                        </validation-provider>

                        <br>
                        <button class="button" type="submit">Guardar</button>
                    </div>
                </form>
            @endcan

            <a class="item-menu" href="{{route('seller.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>

@endsection
