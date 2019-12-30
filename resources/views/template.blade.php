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
                <a class="title-button" href="{{route('client.index')}}"><li class="link" >CLIENTES</li></a>
                <a class="title-button" href="{{route('product.index')}}"><li class="link" >PRODUCTOS</li></a>
                <a class="title-button" href="{{route('seller.index')}}"><li class="link">VENDEDORES</li></a>
                <a class="title-button" href="{{route('invoice.index')}}"><li class="link">FACTURAS</li></a>
                
            </ul>
        </div>
        <div class="login-nav">
            <div class="login-button"></div>
            <div class="login-button">
            <div >

                <p>Usuario: {{ Auth::user()->name }}</p>
            </div>
            <div  >
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <p class="title-button">LOGOUT</p> 
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