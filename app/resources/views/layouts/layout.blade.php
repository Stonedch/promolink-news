<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/markdown.js/0.5.0/markdown.min.js">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adaption.css') }}">
    <title>Promolink News - List</title>
</head>

<body>

    <header>
        <div class="container">
            <a href="/" class="logo">
                <div class="logo-img">
                    <img src="{{ asset('img/logotype-white.svg') }}">
                </div>
            </a>
            <div class="link-list">
                @if (Auth::check())
                    <a href="/platform/profile/">Профиль</a>
                    <a href="/platform/logout/">Выйти</a>
                @else
                    <a href="/platform/login/">Войти</a>
                @endif
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="logo">
                <div class="logo-img">
                    <img src="{{ asset('img/logotype-white.svg') }}">
                </div>
            </div>
            <div class="link-list">
                <a href="https://github.com/stonedch/"><i class="fa-brands fa-github"></i> Stonedch</a>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/ef05bcf04b.js" crossorigin="anonymous"></script>
</body>

</html>