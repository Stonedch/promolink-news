<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>

    @foreach ($categories as $category)
        @if (count($category->posts))

            <h2>{{$category->name}}</h2>

            @foreach ($category->posts as $post)
                <h3><a href="/news/{{ $post->id }}">{{ $post->title }}</a></h3>
                <p>{{ $post->body }}</p>
            @endforeach

        @endif
    @endforeach

</body>

</html>