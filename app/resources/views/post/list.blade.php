@extends('layouts.layout')

@section('content')
    <section class="category-list container">
        @foreach ($categories as $category)
            @if (count($category->posts()->get()))
                <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
            @endif
        @endforeach
    </section>

    <section class="container">

        <form class="search" action="{{ route('news.index') }}" method="GET">
            <input type="text" name="search" placeholder="{{ __('Search') }}" value="{{ $search }}" />
            <button type="submit">{{ __('Search') }}</button>
        </form>

        <div class="item">
            <h2>{{ __('Last News') }}</h2>
            <div class="post-list">
                @if (empty($posts->items()))
                    <h2>{{ __('Empty') }}</h2>
                @else
                    @foreach ($posts as $post)
                        <a href="{{ route('news.show', $post->slug) }}" class="item">
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

                    @if ($posts->count() > 1)
                        <div class="pagination">
                            @if ($prev = $posts->previousPageUrl())
                                <a href="{{ $prev }}" class="item">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    <span>{{ __('Back') }}</span>
                                </a>
                            @endif

                            <span class="current">
                                {{ $posts->currentPage() }}
                            </span>

                            @if ($next = $posts->nextPageUrl())
                                <a href="{{ $next }}" class="item">
                                    <span>{{ __('Next') }}</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>
@stop
