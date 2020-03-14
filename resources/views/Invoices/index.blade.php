@extends('template')

@section('content')

    <div class="container-menu">
        <div class="container-item">
            <a class="item-menu" href="{{route('invoice.create')}}">
                <div class="item-button">
                    Nueva Factura
                </div>
            </a>
            <a class="item-menu" href="/orders/updateInvoices">
                <div class="item-button">
                    Actualizar Facturas
                </div>
            </a>
        </div>
    </div>
    <div>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="">
                    <i class="material-icons" style="color: rgba(0, 0, 0, 0.5)">find_in_page</i>
                    Buscar:
                </label>
                <div>
                    <form class="form" action="/invoice" method="get">
                        <div class="items-form">
                            <div class="list">
                                <select class="list-select" name="state" id="" placeholder=""  style="width: 20% ">
                                    <option value=""></option>
                                    <option value="Por pagar">Por Pagar</option>
                                    <option value="Pagado">Pagado</option>
                                </select>
                                <validation-provider rules="number" v-slot="v">
                                    <span class="validate-input">@{{ v.errors[0] }}</span>
                                    <input v-model="value" type="search" name="code" placeholder="Codigo Factura {{$code}} " style="width: 20% ">
                                </validation-provider>
                                <validation-provider rules="number" v-slot="v">
                                    <span class="validate-input">@{{ v.errors[0] }}</span>
                                    <input v-model="value" type="search" name="seller_id" placeholder="Id Vendedor {{$seller_id}}" style="width: 20% ">
                                </validation-provider>
                                <validation-provider rules="number" v-slot="v">
                                    <span class="validate-input">@{{ v.errors[0] }}</span>
                                    <input v-model="value" type="search" name="client_id" placeholder="Id Cliente {{$client_id}}" style="width: 20% ">
                                </validation-provider>

                            </div>
                            <label for="">Fecha de Expedición: </label>
                            <div>
                                <label for="">Desde: </label>
                                <input style="width: 20% " type="date" name="dateStart" id="">
                                <label for="">Hasta: </label>
                                <input style="width: 20% " type="date" name="dateFinish" id="">
                            </div>
                            <button class="button" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <br>
            </div>
            <div>
                <table>
                    <tr>
                        <th>Ver</th>
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Fecha de Expedición</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total</th>
                        <th>Vendedor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    @foreach($invoices as $invoice)
                        <tr>
                            <div style="width:50%; margin: 0px auto; font-size: 20px">
                                <td>
                                    <a href="{{route('invoice.show', $invoice->id)}}">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                </td>
                                <td>{{$invoice->code}}</td>
                                <td>{{$invoice->state}}</td>
                                <td>{{$invoice->client->first_name}}</td>
                                <td>{{$invoice->expedition_date}}</td>
                                <td>{{$invoice->expiration_date}}</td>
                                <td>
                                    ${{number_format($invoice->total, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                                <td>{{$invoice->seller->first_name}}</td>
                                <td>
                                    <a href="{{route('invoice.edit', $invoice->id)}}">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('invoice.delete', $invoice->id )}}">
                                        <i class="material-icons">delete_outline</i>
                                    </a>
                                </td>

                            </div>
                        </tr>
                    @endforeach()
                </table>
            </div>
            <div class="container-pagination">
                {{$invoices->appends($_GET)->links()}}
            </div>
            <div class="container-menu">
                <div class="container-item">
                    <a class="item-menu" href="{{route('invoice.export')}}">
                        <div class="item-button">
                            Exportar Factura
                        </div>
                    </a>
                </div>
            </div>


            <br>
            <div>
                <form class="form" action="{{route('invoice.import')}}" method="post" enctype="multipart/form-data">
                    <div class="items-form">
                        @csrf
                        <input type="file" name="file" id="">
                        <button class="button" type="submit">Importar</button>
                    </div>
                </form>
            </div>
            <br>

@endsection
