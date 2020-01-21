@extends('template')
@section('content')

    <div class="content-form">
        <div class="board-form">
            <div class="content-title">
                <div class="title">
                    <h1>¿Desea Eliminar la Factura?</h1>
                </div>
            </div>
            <form class="form" action="{{route('invoice.destroy', $invoice)}} " method="POST">
                @method('DELETE')
                @csrf
                <div class="items-form">
                    <button class="button" type="submit">Eliminar</button>
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
