<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Facturación</title>
</head>
<body>
    <nav class="main-nav">
        <div class="bar-nav">
            <ul class="button">
                <a href="{{route('clients')}}"><li>CLIENTES</li></a>
                <a href="{{route('products')}}"><li>PRODUCTOS</li></a>
                <a href="{{route('sellers')}}"><li>VENDEDORES</li></a>
                <a href="{{route('invoices')}}"><li>FACTURAS</li></a>
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> <li>LOGOUT</li> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
            </ul>
        </div>
    </nav>
    <section>
        <div class="content">
            @yield('content')
        </div>
    </section>
    <footer>
    </footer>
</body>
</html>