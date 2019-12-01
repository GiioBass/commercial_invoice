@extends('template')
@section('content')

<div class="title"  style=" width: 30%; margin:50px auto; text-align: center">
    <h1>AÑADIR VENDEDOR</h1>
</div>

@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('seller.store')}} " method="POST" style="margin:0px 20%; padding: 0px 130px ">
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
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{old('id')}}">
        <p>Nombres</p>
        <input type="text" name="first_name" id="" value="{{old('first_name')}}">
        <p>Apellidos</p>
        <input type="text" name="last_name" id="" value="{{old('last_name')}}">
        <p>E-mail</p>
        <input type="text" name="email" id="" value="{{old('email')}}">
        <p>Número Telefono</p>
        <input type="text" name="phone_number" id="" value="{{old('phone_number')}}">
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{route('seller.index')}}">Atras</a>
</div>


@endsection