@extends('layouts.layout')

@section('content')
    <section class="category-list container">
        <div class="item">
            <h2>{{ __('Last News') }}</h2>
            <div class="post-list">
                @foreach ($posts as $post)
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

            </div>
        </div>
    </section>
@stop