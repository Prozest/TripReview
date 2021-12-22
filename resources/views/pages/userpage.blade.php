@extends('layouts.app')

@section('content')

    <div class="header">
        <div class="header-text">
            {{$user->name}}'s Posts
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
                                    <div class="entry-time">Created on {{ $post->created_at }}</div>
                                    <div class="post-like-count" >{{ count($post->likes) }} Likes</div>
                                        <div class="post-like"><img src="/storage/logos/Like.png"
                                                class="post-like-image">
                                        </div>
                                        <div class="post-like-count">{{ count($post->comments) }} Comments</div>
                                        <div class="post-like"><img src="/storage/logos/Comment.png"
                                                class="post-like-image"></div>
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
        User has no posts
    @endif


@endsection
