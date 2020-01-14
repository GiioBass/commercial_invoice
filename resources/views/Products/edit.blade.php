@extends('template')
@section('content')
<h1>Editar Producto {{$product->name}}</h1>

@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('product.update', $product)}} " method="POST" style="margin:0px 20%; padding: 0px 130px ">
        @method('PUT')
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
        <input type="text" name="id" id="" style="text-align:center" value="{{number_format($product->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}">
        <p>Nombre</p>
        <input type="text" name="name" id="" value="{{$product->name}}">
        <p>Descripcion</p>
        <input type="text" name="description" id="" value="{{$product->description}}">
        <p>Valor Unidad</p>
        <input type="text" name="unit_value" id="" value="{{number_format($product->unit_value, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}">
        <br>
        <button type="submit">Editar</button>
    </form>
    <a href="{{route('product.index')}}">Atras</a>
</div>
@endsection