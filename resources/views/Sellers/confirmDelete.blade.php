@extends('template')
@section('content')

<div class="content-form">
    <div class="board-form">
        <div class="content-title">
            <div class="title">
                <h1>ELIMINAR VENDEDOR</h1>
            </div>
        </div>
        <form class="form" action="{{route('seller.destroy', $seller)}} " method="POST">
            @method('DELETE')
            @csrf
            <div class="items-form">
                <button class="button" type="submit">Eliminar</button>
            </div>
        </form>
        <a class="item-menu" href="{{route('seller.index')}}">
            <div class="item-button">
                Atras
            </div>
        </a>
    </div>
</div>
@endsection