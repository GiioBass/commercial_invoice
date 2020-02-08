@extends('template')

@section('content')

    <div class="content-detail">
        <div class="board-detail">
            <div class="title-detail">
                <h1>Detalles
                    Factura {{$invoices->code}}</h1>
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
                        Tipo
                        Id: {{$invoices->client->document_type->documentName}}
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
                <div>
                    <p>
                        Vendedor: {{$invoices->seller->first_name . ' ' . $invoices->seller->last_name}}
                    </p>
                </div>
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
                    </p>
                </div>
                <div>
                </div>


                <div>
                    <a class="item-menu" href="/invoice/{{$invoices->id}}/invoice_product/create">
                        <div class="item-button">
                            Agregar Producto
                        </div>
                    </a>
                    <a class="item-menu" href="/invoice/{{$invoices->id}}/report/show">
                        <div class="item-button">
                            Ver Historico de Pagos
                        </div>
                    </a>
                    <a class="item-menu" href="/invoice/{{$invoices->id}}/report/create">
                        <div class="item-button">
                            Realizar Pago
                        </div>
                    </a>
                </div>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Valor Unidad</th>
                        <th>Total Producto</th>
                        <th>Eliminar</th>
                    </tr>
                    @foreach ($invoices->products as $product)
                        <tr>
                            <td>{{number_format($product->id, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>
                                $ {{number_format($product->unit_value, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                            <td>
                                $ {{number_format($product->unit_value * $product->pivot->quantity, $decimals = 0, $dec_point = '.', $thousands_sep = '.')}}</td>
                            <td><a href="/invoice/{{$invoices->id}}/invoice_product/{{$product->pivot->id}}/destroy">
                                    <i class="material-icons">delete_outline</i>
                                </a>
                            </td>
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
