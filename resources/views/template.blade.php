<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Facturación</title>
</head>
<body>
<nav class="main-nav">
    <div class="bar-nav">
        <ul class="button">
            <a class="title-button" href="{{route('home')}}">
                <i class="material-icons">house</i>
                <li class="link">
                    Inicio
                </li>
            </a>
            @can('client.index')
                <a class="title-button" href="{{route('client.index')}}">
                    <i class="material-icons">person_outline</i>
                    <li class="link">
                        Clientes
                    </li>
                </a>
            @endcan
            @can('product.index')
                <a class="title-button" href="{{route('product.index')}}">
                    <i class="material-icons">local_grocery_store</i>
                    <li class="link">
                        Productos
                    </li>
                </a>
            @endcan
            @can('seller.index')
                <a class="title-button" href="{{route('seller.index')}}">
                    <i class="material-icons">person_outline</i>
                    <li class="link">
                        Vendedores
                    </li>
                </a>
            @endcan
            @can('invoice.index')
                <a class="title-button" href="{{route('invoice.index')}}">
                    <i class="material-icons">event_note</i>
                    <li class="link">
                        Facturas
                    </li>
                </a>
            @endcan
            @can('user.index')
                <a class="title-button" href="{{route('user.index')}}">
                    <i class="material-icons">person_outline</i>
                    <li class="link">
                        Usuarios
                    </li>
                </a>
            @endcan
            @can('role.index')
                <a class="title-button" href="{{route('role.index')}}">
                    <i class="material-icons">person_outline</i>
                    <li class="link">
                        Roles
                    </li>
                </a>
            @endcan
            @can('access_api')
                <a class="title-button" href="{{route('access_api')}}">
                    <i class="material-icons">person_outline</i>
                    <li class="link">
                        Accesos API
                    </li>
                </a>
            @endcan

        </ul>
    </div>
    <div class="login-nav">
        <div class="login-button"></div>
        <div class="login-button">
            <div>
                <i class="material-icons">account_circle</i>
                <p>{{ Auth::user()->name }}</p>
            </div>
            <div style="margin-left: 40px">
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i style="font-size: 40px" class="material-icons">exit_to_app</i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

    </div>
</nav>

<section class="section-main ">
    <div class="content">
        <div id="app">

            @yield('content')
        </div>

    </div>
</section>
<footer>
</footer>
<script src="{{asset('./js/app.js')}}"></script>
</body>
</html>
