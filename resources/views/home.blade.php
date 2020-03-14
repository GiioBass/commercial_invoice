<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ibarra+Real+Nova&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <title>INICIO</title>
</head>

<body>


    <div class="main">
        <div class="container">
            <div class="login-nav">
                <div >
                    <i class="material-icons icon">account_circle</i>
                </div>
                <div >
                    <p class="item">{{ Auth::user()->name }}</p>
                </div>
                <div >
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i  class="material-icons icon">exit_to_app</i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
                </div>

            </div>
            <div>
                <p class="item">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons icon">exit_to_app</i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
        <div class="container-title">
            <h1 class="title">Pasarela de Pagos</h1>
        </div>


        <div class="container-content">
            <div class="content-top">
                <ul class="menu-top">
                    @can('invoice.index')
                        <li class="item-li">
                            <a href="{{route('invoice.index')}}" class="item-a radius-t">
                                <i class="material-icons icon">event_note</i>
                                <p>Facturas</p>
                            </a>
                        </li>
                    @endcan
                    @can('invoice.create')
                        <li class="item-li">
                            <a href="{{route('invoice.create')}}" class="item-a radius-b">
                                <i class="material-icons icon">add</i>
                                <p>Nueva Factura</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="content-bottom">
                <ul class="menu-bottom">
                    @can('client.index')
                        <li class="item-li">
                            <a href="{{route('client.index')}}" class="item-a radius-tl">
                                <i class="material-icons icon">person_outline</i>
                                <p>Clientes</p>
                            </a>
                        </li>
                    @endcan
                    @can('product.index')
                        <li class="item-li">
                            <a href="{{route('product.index')}}" class="item-a">
                                <i class="material-icons icon">local_grocery_store</i>
                                <p>Productos</p>
                            </a>
                        </li>
                    @endcan
                    @can('seller.index')
                        <li class="item-li">
                            <a href="{{route('seller.index')}}" class="item-a radius-tr">
                                <i class="material-icons icon">person_outline</i>
                                <p>Vendedores</p>
                            </a>
                        </li>
                    @endcan
                </ul>
                <ul class="menu-bottom">
                    @can('client.create')
                        <li class="item-li">
                            <a href="{{route('client.create')}}" class="item-a radius-bl">
                                <i class="material-icons icon">add</i>
                                <p>Nuevo Cliente</p>
                            </a>
                        </li>
                    @endcan
                    @can('product.create')
                        <li class="item-li">
                            <a href="{{route('product.create')}}" class="item-a">
                                <i class="material-icons icon">add</i>
                                <p>Nuevo Producto</p>
                            </a>
                        </li>
                    @endcan
                    @can('seller.create')
                        <li class="item-li">
                            <a href="{{route('seller.create')}}" class="item-a radius-br">
                                <i class="material-icons icon">add</i>
                                <p>Nuevo Vendedor</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="content-top">
                <ul class="menu-top">
                    @can('user.index')
                        <li class="item-li">
                            <a href="{{route('user.index')}}" class="item-a radius-t">
                                <i class="material-icons icon">person_outline</i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    @endcan
                    @can('role.index')
                        <li class="item-li">
                            <a href="{{route('role.index')}}" class="item-a radius-b">
                                <i class="material-icons icon">person_outline</i>
                                <p>Permisos</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>
</body>

</html>

