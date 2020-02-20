@extends('template')
@section('content')

    @if(session('message'))
        {{session('message')}}
    @endif
    <div class="content-errors">
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
                    <h1>AÑADIR PRODUCTO</h1>
                </div>
            </div>
            <form class="form" action="/invoice/{{$invoice->id}}/invoice_product" method="POST">
                @csrf
                <div class="items-form">

                    <label for="">Id Producto:</label>
                    <div class="list">
                        <select class="list-select" name="product_id" id="">
                            @foreach ($product as $products)
                                <option value="{{$products->id}}">
                                    {{number_format($products->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.') . ' - ' . $products->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <label for="">Cantidad</label>
                    <validation-provider rules="required|number" v-slot="v">
                        <span class="validate-input">@{{ v.errors[0] }}</span>
                        <input v-model="value" type="text" name="quantity" id="" value="">
                    </validation-provider>

                    <input type="text" name="invoice_id" id="" value="{{$invoice->id}}" style="visibility: hidden">
                    <button class="button" type="submit">Guardar</button>
                </div>
            </form>
            <a class="item-menu" href="{{route('invoice.show', $invoice->id)}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>

@endsection
