@extends('layouts.app')

@section('content')
    <div class="title">
        <div class="title-big">
            Welcome to Resort Reviews!
        </div>
        @guest
            <div class="title-sub">
                Wanna become a reviewer? Join us!
            </div>
            <div class="title-buttons">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"><button class="login">
                            Login
                        </button></a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><button class="reg">
                            Register
                        </button></a>

                @endif
            </div>
        @else
            <div class="title-sub">
                Visited a place? Write a review!
            </div>
            <div class="title-buttons">
                <a href="posts/create" class="button-text"><button class="post-create">
                        Write Review
                    </button></a>
            </div>
        @endguest
    </div>
    @include('inc.messages')

    <div class="header" style="margin-top: 10px">
        <div class="header-text">
            Reviews
        </div>
        <div class="line-big"></div>
    </div>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="entry">
                <div class="entry-background">
                    <a href="/posts/{{ $post->id }}" class="entry-link">
                        <div class="entry-content">
                            <div class="entry-title">{{ $post->title }}</div>
                            <div>
                                <img class="entry-image" src="/storage/cover_images/{{ $post->cover_image }}">
                            </div>
                            <div style="height: 100%; width:30%; float: right; padding-top:10px; padding-right:20px">
                                <div class="post-summary">Location Details</div>
                                <div class="post-entry">
                                    <div class="post-entry-text-left"></div>Country<div class="post-entry-text-right">
                                        {!! $post->country !!}</div>
                                </div>
                                <div class="post-entry">
                                    <div class="post-entry-text-left"></div>State<div class="post-entry-text-right">
                                        {!! $post->state !!}</div>
                                </div>
                                <div class="post-rating">
                                    <div class="post-rating-text"></div>Rating<div class="post-entry-rating">
                                        {!! $post->rating !!}</div>
                                </div>
                            </div>
                            <div class="entry-details">
                                <div class="entry-summary">Summary</div>
                                <div class="entry-summary-text">{{ $post->body }}</div>
                                <div class="entry-bottom">
                                    <div style="width:40%; float:left;">
                                        <div class="entry-time">Created on {{ $post->created_at }}</div>
                                        <div class="entry-author">By {{ $post->user->name }}</div>
                                    </div>
                                    <div class="post-like-count">{{ count($post->likes) }} Likes</div>
                                    <div class="post-like"><img src="/storage/logos/Like.png" class="post-like-image">
                                    </div>
                                    <div class="post-like-count">{{ count($post->comments) }} Comments</div>
                                    <div class="post-like"><img src="/storage/logos/Comment.png"class="post-like-image"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="line-container">
                <div class="line-small"></div>
            </div>
        @endforeach
    @else
        There are no posts
    @endif

    <!--<div class="posts">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="post-h">
                                <div><a href="posts/{{ $post->id }}" class="post-h-title">{{ $post->title }}</a></div>
                                <small>Written on {{ $post->created_at }}</small>
                            </div>
                        @endforeach
        @else
                        <p>no posts</p>
                    @endif
                </div>-->
@endsection
