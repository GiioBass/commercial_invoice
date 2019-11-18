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
                <a href="#"><li>OPTION 1</li></a>
                <a href="#"><li>OPTION 2</li></a>
                <a href="#"><li>OPTION 3</li></a>
                <a href="#"><li>OPTION 4</li></a>
                <a href="{{route('login')}}"> <li>LOGIN</li> </a>
                
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