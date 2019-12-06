@extends('template')
@section('content')


@if(session('message'))
    {{session('message')}}
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" invoice/{{$invoice->id}}/invoice_product" method="POST" style="margin:0px 20%; padding: 0px 130px ">
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
        <p>Id Producto</p>
        <input type="text" name="id" id=""  value="">
        <p>Product id</p>
        <input type="text" name="product_id" id=""  value="">
        <p>Invoice id</p>
        <input type="text" name="invoice_id" id=""  value="">
        
        <button type="submit">Guardar</button>
    </form>
</div>
<div>
<a href="/invoice/{{$invoice->id}}">Atras</a>
</div>

@endsection