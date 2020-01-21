@extends('template')
@section('content')

    @if(session('message'))
        <div>{{session('message')}}</div>
    @endif

    <div class="content-error">
        <div class="errors">
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="content-form">
        <div class="board-form">
            <div class="content-title">
                <div class="title">
                    <h1>EDITAR FACTURA {{$invoice->id}}</h1>
                </div>
            </div>
            <form class="form" action=" {{route('invoice.update', $invoice->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="items-form">
                    <label for="">Estado:</label>
                    <div class="list">
                        <select class="list-select" name="state" id="">
                            <option value="Pagado">Pagado</option>
                            <option value="Por Pagar">Por Pagar</option>
                        </select>
                    </div>
                    <label for="">Fecha de Expedición:</label>
                    <input type="date" name="expedition_date" id="" value="{{$invoice->expedition_date}}">
                    <label for="">Fecha de Expiración:</label>
                    <input type="date" name="expiration_date" id="" value="{{$invoice->expiration_date}}">

                    <input type="text" name="subTotal" id="" value="{{$invoice->subTotal}}" readonly>

                    <input type="text" name="iva" id="" value="{{$invoice->iva}}" readonly>

                    <input type="text" name="total" id="" value="{{$invoice->total}}" readonly>

                    <label for="">Id Vendedor:</label>
                    <input type="text" name="seller_id" id="" value="{{$invoice->seller_id}}">
                    <label for="">Id Cliente:</label>
                    <input type="text" name="client_id" id="" value="{{$invoice->client_id}}">
                    <br>
                    <button class="button" type="submit">Editar</button>
                </div>
            </form>
            <a class="item-menu" href="{{route('invoice.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>
@endsection
