@extends('template')
@section('content')
    {{--TODO provisional--}}
    @if(session('message'))
        {{session('message')}}
    @endif
    {{--  <div class="container-menu">
          <div class="container-item">
              <a class="item-menu" href="{{route('client.create')}}">
                  <div class="item-button">
                      Reporte de Pagos
                  </div>
              </a>
          </div>
      </div>--}}
    {{--<form class="form" action="" method="get">
        <div class="items-form">

            <label for="">
                <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                Buscar:
            </label>
            <input type="search" name="id" id="" placeholder="Id Reporte">
            <button class="button" type="submit">Buscar</button>
        </div>
    </form>--}}
    <div>
        <h1>Reporte de Pagos Factura </h1>
        <table>
            <div>
                <tr>
                    <th>Id</th>
                    <th>Request Id</th>
                    <th>Status</th>
                    <th>Message</th>
                    <th>Fecha de Creacion</th>
                    <th>Fecha de actualización</th>
                    <th>Url</th>
                </tr>
            </div>
            @foreach($invoices->controlReport as $reports)

                <tr>
                    <td>{{$reports->id}}</td>
                    <td>{{$reports->requestId}}</td>
                    <td>{{$reports->status}}</td>
                    <td>{{$reports->message}}</td>
                    <td>{{$reports->created_at}}</td>
                    <td>{{$reports->updated_at}}</td>
{{--TODO no olvidar colocar la fecha de pago realizado ultima fecha actualizacion(?)--}}
                    <td>
                        <a href="{{($reports->status == 'APPROVED' ? '#' : $reports->processUrl )}}">
                            {{($reports->status == 'APPROVED' ? 'Pago Realizado' : 'Continuar / Verificar')}}</a>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <a class="item-menu" href="{{route('invoice.show', $invoices->id)}}">
            <div class="item-button">
                Atras
            </div>
        </a>

    </div>
    {{--<div class="container-pagination">
        {{$clients->links()}}
    </div>--}}

@endsection
