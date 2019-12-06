@extends('template')
@section('content')


<h1>Productos para la Factura {{$invoices->id}}</h1>
    <h3>Detalles</h3>
    <table>
      <tr>
        <td>Cantidad:</td>
        <td>Id Factura:</td>
        <td>Id Producto:</td>
      </tr>
      
     
    </table>
        
@endsection
