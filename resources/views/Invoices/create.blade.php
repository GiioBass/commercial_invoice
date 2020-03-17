@extends('template')
@section('content')


    @if(session('message'))
        {{session('message')}}
    @endif
    @php
        $client = App\Client::all();
        $seller = App\Seller::all();
    @endphp
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
                    <h1>CREAR FACTURA</h1>
                </div>
            </div>
            @can('invoice.create')
                <form class="form" action=" {{route('invoice.store')}}" method="POST">
                    @csrf
                    <div class="items-form">

                        <label for="">Estado</label>
                        <div class="list">
                            <select class="list-select" name="state" id="">
                                <option value="Por pagar">Por Pagar</option>
                                <option value="Pagado">Pagado</option>
                            </select>
                        </div>
                        <label for="">Fecha Expedición</label>

                        <input type="date" name="expedition_date" id="" placeholder="aaaa-mm-dd"
                               value="{{old('expedition_date')}}">
                        <label for="">Fecha Expiración</label>
                        <input type="date" name="expiration_date" id="" placeholder="aaaa-mm-dd"
                               value="{{old('expiration_date')}}">
                        <label for="">Vendedor</label>
                        <div class="list">

                            <select class="list-select" name="seller_id" id="">
                                @foreach ($seller as $sellers)
                                    <option value="{{$sellers->id}}">
                                        {{number_format($sellers->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.') . ' - ' . $sellers->first_name . ' ' . $sellers->last_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="">Cliente</label>
                        <div class="list">

                            <select class="list-select" name="client_id" id="">
                                @foreach ($client as $clients)
                                    <option value="{{$clients->id}}">
                                        {{number_format($clients->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.') . ' - ' . $clients->first_name . ' ' . $clients->last_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <button class="button" type="submit">Guardar</button>
                    </div>
                </form>
            @endcan
            <a class="item-menu" href="{{route('invoice.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>

@endsection
