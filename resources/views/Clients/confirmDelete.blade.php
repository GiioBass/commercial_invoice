@extends('template')
@section('content')

<div class="content-form">
    <div class="board-form">
        <div class="content-title">
            <h1>ELIMINAR CLIENTE</h1>
        </div>
    </div>
    <form class="form" action="{{route('client.destroy', $client)}} " method="POST">
        @method('DELETE')
        @csrf
        <div class="items-form">
            <button class="button" type="submit">Eliminar</button>
        </div>
    </form>
    <a class="item-menu" href="{{route('client.index')}}">
        <div class="item-button">
            Atras
        </div>
    </a>
</div>
@endsection