@extends('template')
@section('content')

<div class="title"  style="width: 30%; margin:50px auto; text-align: center">
    <h1>EDITAR FACTURA</h1>
</div>
@if(session('message'))
<div>{{session('message')}}</div>
@endif

<div style=" width:60%; margin: auto; ">
    <form action=" {{route('invoice.update', $invoice->id)}}" method="POST" style="margin:0px 20%; padding: 0px 130px ">
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
        <input type="text" name="id" id="" style="text-align:center" value="{{$invoice->id}}" readonly>
        <div>
            <select name="state" id="" value="{{old($invoice->state)}}">
                <option >{{$invoice->state}}</option>
                @if ($invoice->state == "Pagado")
                    <option value="Por Pagar">Por Pagar</option>
                @else
                    <option value="Pagado">Pagado</option>
                @endif
            </select>
        </div>
        
        <p>Fecha de Expedición</p>
        <input type="date" name="expedition_date" id="" value="{{$invoice->expedition_date}}">
        <p>Fecha de Expiración</p>
        <input type="date" name="expiration_date" id="" value="{{$invoice->expiration_date}}">
<<<<<<< Updated upstream
        <p>Sub-Total</p>
=======
        {{-- <p>Sub-Total</p>
>>>>>>> Stashed changes
        <input type="text" name="subTotal" id="" value="{{$invoice->subTotal}}" readonly>
        <p>iva</p>
        <input type="text" name="iva" id="" value="{{$invoice->iva}}" readonly>
        <p>Total</p>
<<<<<<< Updated upstream
        <input type="text" name="total" id="" value="{{$invoice->total}}" readonly>
        <p>vendedor</p>
        <input type="text" name="seller_id" id="" value="{{$invoice->seller_id}}">
        <p>cliente</p>
=======
        <input type="text" name="total" id="" value="{{$invoice->total}}" readonly> --}}
        <p>Id Vendedor</p>
        <input type="text" name="seller_id" id="" value="{{$invoice->seller_id}}">
        <p>Id Cliente</p>
>>>>>>> Stashed changes
        <input type="text" name="client_id" id="" value="{{$invoice->client_id}}">
        <br>
        <button type="submit">Editar</button>
        <a href="{{route('invoice.index')}}">Atras</a>
    </form>


@endsection