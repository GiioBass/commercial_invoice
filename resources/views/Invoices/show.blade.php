@extends('template')

@section('content')

    <div class="content-detail">
        <div class="board-detail">
            <div class="title-detail">
                <h1>Detalles
                    Factura {{$invoices->id}}</h1>
            </div>
            <div class="info">
                <div>
                    <p>
                        Id
                        Cliente: {{number_format($invoices->client->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                    </p>
                </div>
                <div>
                    <p>
                        Tipo Cliente: {{$invoices->client->document_type->documentName}}
                    </p>
                </div>
                <div>
                    <p>
                        Cliente: {{$invoices->client->first_name . ' ' . $invoices->client->last_name}}
                    </p>
                </div>
                <div>
                    <p>
                        Telefono: {{$invoices->client->phone_number }}
                    </p>
                </div>
                <br>
                <div>
                    <p>
                        Id Vendedor: {{$invoices->seller->id }}
                    </p>
                </div>
                <div>
                    <p>
                        Vendedor: {{$invoices->seller->first_name . ' ' . $invoices->seller->last_name}}
                    </p>
                </div>
                <br>
                <div>
                    <p>
                        Fecha Creación: {{$invoices->created_at}}
                    </p>
                </div>
                <div>
                    <p>
                        Fecha Vencimiento: {{$invoices->expiration_date}}
                    </p>
                </div>
                <div>
                    <p>
                        Estado de la Factura: {{$invoices->state}}
{{--                        - {{($reports->status == 'PENDING' ? 'Pendiente' : ' ')}}--}}
                    </p>
                </div>
                <div>
                </div>


                <div>
                    @can('order.create')
                        <a class="item-menu" href="{{route('order.create', $invoices->id)}}">
                            <div class="item-button">
                                Agregar Producto
                            </div>
                        </a>
                    @endcan
                    <br>
                    @can('report.show')
                        <a class="item-menu" href="{{route('report.show', $invoices->id)}}">
                            <div class="item-button">
                                Ver Historico de Pagos
                            </div>
                        </a>
                    @endcan
                    <br>
                    @can('report.create')
                        <a class="item-menu" href="{{route('report.create', $invoices->id)}}"  style="display: {{$invoices->state == 'Pagado' ? 'none' : 'visibility'}}">
                            <div class="item-button">

                                {{$invoices->state == 'Pagado' ? 'Pago Realizado' : 'Realizar Pago'}}
                            </div>
                        </a>
                    @endcan
                    <br>
                </div>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Valor Unidad</th>
                        <th>Total Producto</th>
                        @can('order.delete')
                            <th>Eliminar</th>
                        @endcan
                    </tr>
                    @foreach ($invoices->products as $product)
                        <tr>
                            <td>
                                {{number_format($product->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->pivot->quantity}}
                            </td>
                            <td>
                                $ {{number_format($product->unit_value, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                            </td>
                            <td>
                                $ {{number_format($product->unit_value * $product->pivot->quantity, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                            </td>
                            @can('order.delete')
                                <td>
                                    <a href="{{route('order.delete', [$invoices->id ,$product->pivot->id])}}">
                                        <i class="material-icons">delete_outline</i>
                                    </a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>

                <div class="content-total">
                    <div class="content-empty">
                    </div>
                    <div class="detail-total">
                        <p>
                            Total antes de Iva:
                            $ {{number_format($invoices->subtotal, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                        </p>
                        <p>
                            IVA:
                            $ {{number_format($invoices->iva, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                        </p>
                        <h3>
                            Total:
                            $ {{number_format($invoices->total, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}
                        </h3>
                    </div>
                </div>
                <a class="item-menu" href="{{route('invoice.index')}}">
                    <div class="item-button">
                        Atras
                    </div>
                </a>
            </div>

            <div class="item">

            </div>
        </div>
    </div>

@endsection
