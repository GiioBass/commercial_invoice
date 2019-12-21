@extends('template')
@section('content')

@php
    $product = App\Product::all();
@endphp

@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action="/invoice/{{$invoice->id}}/invoice_product" method="POST" style="margin:0px 20%; padding: 0px 130px ">
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
        <p>Id</p>
        <input type="text" name="id" id=""  value="">
        <p>Product id</p>
        <select name="product_id" id="">
            @foreach ($product as $products)
                <option value="{{$products->id}}">{{$products->id . ' - ' . $products->name}}</option>
            @endforeach
        </select>
        <p>Cantidad</p>
        <input type="text" name="quantity" id=""  value="">
        <input type="text" name="invoice_id" id=""  value="{{$invoice->id}}" style="visibility: hidden" >
        
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
<a href="{{route('invoice.show', $invoice->id)}}">Atras</a>
</div>

@endsection