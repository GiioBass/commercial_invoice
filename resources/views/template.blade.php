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
            <a class="title-button" href="{{route('client.index')}}">
                <i class="material-icons">person_outline</i>
                <li class="link">
                    Clientes
                </li>
            </a>
            <a class="title-button" href="{{route('product.index')}}">
                <i class="material-icons">local_grocery_store</i>
                <li class="link">
                    Productos
                </li>
            </a>
            <a class="title-button" href="{{route('seller.index')}}">
                <i class="material-icons">person_outline</i>
                <li class="link">
                    Vendedores
                </li>
            </a>
            <a class="title-button" href="{{route('invoice.index')}}">
                <i class="material-icons">event_note</i>
                <li class="link">
                    Facturas
                </li>
            </a>

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

        @yield('content')
    </div>
</section>
<footer>
</footer>
</body>
</html>
