@extends('layouts.layout')

@section('content')
<section class="post-detail container">

    <div class="top">
        <h2>{{$post->title}}</h2>
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
    </div>

    <p class="body">
        {{$post->body}}
    </p>

</section>
@stop