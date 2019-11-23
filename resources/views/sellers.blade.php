@extends('template')
@section('content')
<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>MODULO VENDEDORES</h1>
</div>
@foreach($sellers as $seller)
<tr>
        <div style="width:50%; margin: 0px auto; font-size: 20px">
            <td>
                <a href="{{route('description_seller', $seller)}}" style="font-size: 18px ; color: #1f00ff ;">
                    Ver 
                </a>    
            </td>
            <td>- {{$seller->id}} - </td>
            <td>{{$seller->first_name}} -</td>
            <td>{{$seller->last_name}} - </td>
            <td>{{$seller->email}} - </td>
            <td>{{$seller->phone_number}}  </td>
            <br>
        </tr>
    </div>
@endforeach()

<div style="text-align:center; margin:50px">
   <a href="{{route('add_seller')}}">Añadir Nuevo Producto</a>
</div>
@endsection