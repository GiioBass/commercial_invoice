@extends('template')
@section('content')


@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('invoice.store')}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @csrf

        @error('id') 
            <h1>Ingrese un ID</h1>
        @enderror
        <p>ID</p>
        <input type="text" name="id" id=""  value="{{old('id')}}">
        <p>Fecha de Expedicion</p>
        <input type="date" name="expedition_date" id="" placeholder="aaaa-mm-dd">
        <p>Fecha de Expiracion</p>
        <input type="date" name="expiration_date" id="" placeholder="aaaa-mm-dd" >
        <p>Iva</p>
        <input type="text" name="iva" id="" >
        <p>Total</p>
        <input type="text" name="total" id="" >
        <p>vendedor</p> 
        <input type="text" name="sellers_id" id="" > 
        <p>cliente</p>
        <input type="text" name="clients_id" id="" > 
        <br>
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
<a href="{{route('invoice.index')}}">Atras</a>
</div>

@endsection