@extends('template')
@section('content')

<h1>MODULO DE PRODUCTOS</h1>

@foreach($products as $product)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                <a href="{{route('description_product', $product)}}" style="font-size: 18px ; color: #1f00ff ;">
                    Ver 
                </a>    
            </td>
            <td>- {{$product->name}} - </td>
            
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
   <a href="{{route('add_product')}}">Añadir Nuevo Producto</a>
</div>
<div class="container-pagination">
    
       pagination
   
</div>

@endsection