@extends('layouts.layout')

@section('content')
    <section class="category-list container">
        @foreach ($categories as $category)
            @if (count($category->posts))
                <div class="item">
                    <h2>{{ __('Last News') }}</h2>
                    <div class="post-list">
                        @foreach ($category->posts as $post)
                            <a href="/news/{{ $post->id }}" class="item">
                                <h3>{{ $post->title }}</h3>
                                <div class="info">
                                    <div class="item">
                                        <i class="fa-regular fa-folder"></i>
                                        <span>{{ $post->category()->name }}</span>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-at"></i>
                                        <span>{{ $post->user()->name }}</span>
                                    </div>
                                    <div class="item">
                                        <i class="fa-regular fa-calendar"></i>
                                        <span>{{ $post->date() }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </section>
@stop