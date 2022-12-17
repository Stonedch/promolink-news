<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Promolink News - {{ $post->title }}</title>
</head>

<body>
<header class="main-header">
        <a href="#" class="logo-link" target="_self">Promolink News</a>
        <a href="#" class="authorization"> Авторизация</a>
    </header>
    <h2><a href="/news/{{$post->id}}">{{$post->title}}</a></h2>
    <p>{{$post->body}}</p>
</body>

</html>