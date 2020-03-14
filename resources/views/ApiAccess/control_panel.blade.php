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
            <div>
                <i class="material-icons icon">account_circle</i>
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
            <h1 class="title">Control de Accesos Api</h1>
        </div>


        <div class="container-content">
            <div id="app">
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
        <a class="item-menu" href="{{route('home')}}">
            <div class="item-button">
                Atras
            </div>
        </a>
    </div>
</div>
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>

