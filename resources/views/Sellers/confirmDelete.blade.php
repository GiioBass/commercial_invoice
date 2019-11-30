@extends('template')
@section('content')
<div class="title" style="width: 30%; margin:50px auto;  text-align:center ">
    <h1>ELIMINAR VENDEDOR</h1>
</div>

<form  action="{{route('seller.destroy', $seller)}}" method="POST">
    @method('DELETE')
    @csrf
    <button style="display: block; text-decoration: none;" type="submit">Eliminar Cliente</button>
</form>
<a href="{{route('seller.index')}}">Atras</a>


@endsection