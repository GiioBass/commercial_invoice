@extends('template')
@section('content')


@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('create_seller')}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id="" style="text-align:center" value="{{old('id')}}">
        <p>Nombres</p>
        <input type="text" name="first_name" id="">
        <p>Apellidos</p>
        <input type="text" name="last_name" id="">
        <p>E-mail</p>
        <input type="text" name="email" id="">
        <p>Número Telefono</p>
        <input type="text" name="phone_number" id="">
        <br>
        <button type="submit">Guardar</button>
    </form>
</div>


@endsection