@extends('template')
@section('content')

<div class="title" style="width: 30%; margin:50px auto;  text-align:center ">
    <h1>ELIMINAR PRODUCTO</h1>
</div>


<form  action="{{route('product.destroy', $product)}}
 " method="POST">
    @method('DELETE')
    @csrf
    <button style="display: block; text-decoration: none;" type="submit">Eliminar</button>
</form>
<a href="{{route('product.index')}}">Atras</a>
@endsection