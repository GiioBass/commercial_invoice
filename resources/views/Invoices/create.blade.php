@extends('template')
@section('content')


@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('invoice.store')}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
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
        <input type="text" name="id" id=""  value="{{old('id')}}">
        <p>State</p>
        <input type="text" name="state" id=""  value="{{old('state')}}">
        <p>Fecha de Expedicion</p>
        <input type="date" name="expedition_date" id="" placeholder="aaaa-mm-dd" value="{{old('expedition_date')}}">
        <p>Fecha de Expiracion</p>
        <input type="date" name="expiration_date" id="" placeholder="aaaa-mm-dd" value="{{old('expiration_date')}}" >
        <p>Iva</p>
        <input type="text" name="iva" id="" value="{{old('iva')}}" >
        <p>Total</p>
        <input type="text" name="total" id="" value="{{old('total')}}" >
        <p>vendedor</p> 
        <input type="text" name="seller_id" id="" value="{{old('seller_id')}}" > 
        <p>cliente</p>
        <input type="text" name="client_id" id="" value="{{old('client_id')}}" > 
        <br>
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
<a href="{{route('invoice.index')}}">Atras</a>
</div>

@endsection