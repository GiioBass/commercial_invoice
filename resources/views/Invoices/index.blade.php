@extends('template')

@section('content')
    @if(session('message'))
        {{session('message')}}
    @endif

    <div class="container-menu">
        <div class="container-item">
            @can('invoice.create')
                <a class="item-menu" href="{{route('invoice.create')}}">
                    <div class="item-button">
                        Nueva Factura
                    </div>
                </a>
            @endcan
            @can('orders.updateInvoices')
                <a class="item-menu" href="{{route('orders.updateInvoices')}}">
                    <div class="item-button">
                        Actualizar Facturas
                    </div>
                </a>
            @endcan
{{--                TODO--}}
{{--            @can('orders.updateInvoices')--}}
{{--                <a class="item-menu" href="{{route('placetopay.updateStates')}}">--}}
{{--                    <div class="item-button">--}}
{{--                        Actualizar Estados de Facturas--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endcan--}}
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
                                <select class="list-select" name="state" id="" placeholder="" style="width: 20% ">
                                    <option value=""></option>
                                    <option value="Por pagar">Por Pagar</option>
                                    <option value="Pagado">Pagado</option>
                                </select>
                                <validation-provider rules="number" v-slot="v">
                                    <span class="validate-input">@{{ v.errors[0] }}</span>

                                    <input v-model="value" type="text" name="id"
                                           placeholder="Codigo Factura {{$id}} " style="width: 20% ">
                                </validation-provider>
                                <validation-provider rules="number" v-slot="v">
                                    <span class="validate-input">@{{ v.errors[0] }}</span>
                                    <input v-model="value" type="search" name="seller_id"
                                           placeholder="Id Vendedor {{$seller_id}}" style="width: 20% ">
                                </validation-provider>
                                <validation-provider rules="number" v-slot="v">
                                    <span class="validate-input">@{{ v.errors[0] }}</span>
                                    <input v-model="value" type="search" name="client_id"
                                           placeholder="Id Cliente {{$client_id}}" style="width: 20% ">

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
                        @can('invoice.show')
                            <th>Ver</th>
                        @endcan
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Fecha de Expedición</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Total</th>
                        <th>Vendedor</th>
                        @can('invoice.edit')
                            <th>Editar</th>
                        @endcan
                        @can('invoice.delete')
                            <th>Eliminar</th>
                        @endcan
                    </tr>
                    @foreach($invoices as $invoice)
                        <tr>
                            <div style="width:50%; margin: 0px auto; font-size: 20px">
                                @can('invoice.show')
                                    <td>
                                        <a href="{{route('invoice.show', $invoice->id)}}">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                    </td>
                                @endcan
                                <td>{{$invoice->id}}</td>
                                <td>{{$invoice->state}}</td>
                                <td>{{$invoice->client->first_name}}</td>
                                <td>{{$invoice->expedition_date}}</td>
                                <td>{{$invoice->expiration_date}}</td>
                                <td>
                                    ${{number_format($invoice->total, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                                <td>{{$invoice->seller->first_name}}</td>
                                @can('invoice.edit')
                                    <td>
                                        <a href="{{route('invoice.edit', $invoice->id)}}">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                @endcan
                                @can('invoice.delete')
                                    <td>
                                        <a href="{{route('invoice.delete', $invoice->id )}}">
                                            <i class="material-icons">delete_outline</i>
                                        </a>
                                    </td>
                                @endcan

                            </div>
                        </tr>
                    @endforeach()
                </table>
            </div>
            <div class="container-pagination">
                {{$invoices->appends($_GET)->links()}}
            </div>
            @can('invoice.export')
                <form action="{{route('invoice.export')}}" method="get">
                    <select name="typeFile" id="">
                        <option value="csv">CSV</option>
                        <option value="xlsx">XLSX</option>
                        {{--                            <option value="txt">TXT</option>--}}
                    </select>
                    <input type="submit" value="Exportar">
                </form>
                {{-- <div class="container-menu">
                     <div class="container-item">
                         <a class="item-menu" href="{{route('invoice.export')}}">
                             <div class="item-button">
                                 Exportar Factura
                             </div>
                         </a>
                     </div>
                 </div>--}}
            @endcan
            <br>
            @can('invoice.import')
                <div>
                    <form class="form" action="{{route('invoice.import')}}" method="POST" enctype="multipart/form-data">
                        <div class="items-form">
                            @csrf
                            <input type="file" name="file" id="">
                            <button class="button" type="submit">Importar</button>
                        </div>
                    </form>
                </div>
            @endcan
            <br>
        </div>
    </div>
@endsection
