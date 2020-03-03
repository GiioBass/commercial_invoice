@extends('template')
@section('content')
    {{--TODO provisional--}}
    @php
        $documentType = App\DocumentType::all();
    @endphp
    @if(session('message'))
        <div>{{session('message')}}</div>
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
                    <h1>EDITAR CLIENTE {{$client->first_name}}</h1>
                </div>
            </div>
            @can('client.edit')
                <form class="form" action="{{route('client.update', $client)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="items-form">
                        <label for="">Id:</label>

                        <input type="text" name="id" id="" value="{{$client->id}}">

                        <div class="list">
                            <select class="list-select" name="document_type_id" id="">
                                @foreach ($documentType as $documentTypes)
                                    <option value="{{$documentTypes->id}}">
                                        {{$documentTypes->documentName}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="">Nombres:</label>
                        <input type="text" name="first_name" id="" value="{{$client->first_name}}">
                        <label for="">Apellidos:</label>
                        <input type="text" name="last_name" id="" value="{{$client->last_name}}">
                        <label for="">Número Telefono:</label>
                        <input type="text" name="phone_number" id="" value="{{$client->phone_number}}">
                        <label for="">e-mail:</label>
                        <input type="text" name="email" id="" value="{{$client->email}}">
                        <label for="">Dirección:</label>
                        <input type="text" name="address" id="" value="{{$client->address}}">
                        <br>
                        <button class="button" type="submit">Editar</button>
                    </div>
                </form>
            @endcan
            <a class="item-menu" href="{{route('client.index')}}">
                <div class="item-button">
                    Atras
                </div>
            </a>
        </div>
    </div>
@endsection
