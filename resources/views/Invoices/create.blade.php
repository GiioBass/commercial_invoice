@extends('template')
@section('content')


@if(session('message'))
    {{session('message')}}
@endif

@php
    $client = App\Client::all();
    $seller = App\Seller::all();
@endphp

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
        
        <p>id</p>
        <input type="text" name="id" id=""  value="" >
        <p>State</p>
        <div>
            <select name="state" id="">
                <option value="Por pagar">Por Pagar</option>
                <option value="Pagado">Pagado</option>
            </select>
        </div>
        
        <p>Fecha de Expedicion</p>
        <input type="date" name="expedition_date" id="" placeholder="aaaa-mm-dd" value="{{old('expedition_date')}}">
        <p>Fecha de Expiracion</p>
        <input type="date" name="expiration_date" id="" placeholder="aaaa-mm-dd" value="{{old('expiration_date')}}" >
        <p>vendedor</p> 
        <select name="seller_id" id="">
            @foreach ($seller as $sellers)
            <option value="{{$sellers->id}}">{{$sellers->id . ' - ' . $sellers->first_name . ' ' . $sellers->last_name}}</option>
            @endforeach
        </select>
        <p>cliente</p>
        <select name="client_id" id="">
            @foreach ($client as $clients)
            <option value="{{$clients->id}}">{{$clients->id . ' - ' . $clients->first_name . ' ' . $clients->last_name}}</option>
                @endforeach
            </select>
            <br>
            <input type="text" name="iva" id="" value="0" style="visibility: hidden">
            <input type="text" name="total" id="" value="0" style="visibility: hidden" >
            
        
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
<a href="{{route('invoice.index')}}">Atras</a>
</div>

@endsection