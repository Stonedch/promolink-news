<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Promolink News - List</title>
</head>

<body>
    <main>
        <header class="main-header">
            <a href="/" class="logo-link" target="_self">Promolink News</a>
            <a href="/platform/login/" class="authorization">Авторизация</a>
        </header>

        <div class="link-section">
            @foreach ($categories as $category)
                @if (count($category->posts))
                    <section class="link-section bbc-section" data-order="0">
                        <h2 class="col-header">{{$category->name}}</h2>
                        <ol class="links-list links-list--bbc">
                            @foreach ($category->posts as $post)
                                <li>
                                    <a href="/news/{{ $post->id }}" class="story-title">
                                        {{ $post->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </section>
                @endif
            @endforeach
        </div>

        <footer class="page-footer">
            <a href="/" class="logo-link">Promolink News</a>
        </footer>
    </main>
</body>

</html>