@extends('layouts.app')

@section('content')
    <div class="post">
        <div class="post-header">
            <button class="post-back"><a href="/posts" class="post-back-text">Back</a></button>
            <div class="post-title">{{ $post->title }}</div>
            <div class="post-author-time">Posted by <a class="post-author-link"
                    href="/userpage/{{ $post->user->id }}"><b>{{ $post->user->name }}</b></a> on
                {{ $post->created_at }}
            </div>
            <div class="post-buttons">
                @if (!Auth::guest())
                    @if (Auth::user()->id == $post->user_id)
                        <a href="{{ $post->id }}/edit" class='entry-button-container'>
                            <button class="entry-button">
                                Edit
                            </button>
                        </a>
                        {!! Form::open(['action' => ['App\Http\Controllers\PostController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'entry-button-container']) !!}
                        {!! Form::submit('Delete', ['class' => 'entry-button']) !!}
                        {!! Form::close() !!}
                    @endif

                    <div class="post-like-count">
                        {{ count($post->likes) }} Likes
                    </div>

                    {!! Form::open(['action' => ['App\Http\Controllers\PostController@like', $post->id, 1], 'method' => 'POST', 'class' => 'post-like']) !!}
                    <button class="post-like-button"><img src="/storage/logos/Like.png" class="post-like-image"></button>
                    {!! Form::close() !!}
                @else
                    <div class="post-like-count">{{ count($post->likes) }} Likes</div>
                    <div class="post-like"><img src="/storage/logos/Like.png" class="post-like-image"></div>
                @endif

                <div class="post-like-count">{{ count($post->comments) }} Comments</div>
                <div class="post-like"><img src="/storage/logos/Comment.png" class="post-like-image"></div>
            </div>
        </div>
        <div style="clear: all"></div>
        <div class="post-content">
            <div>
                <img class="post-image" src="/storage/cover_images/{{ $post->cover_image }}">
            </div>
            <div style="float: right; width:28%">
                <div class="post-summary">Location Details</div>
                <div class="post-entry"><div class="post-entry-text-left"></div>Country<div class="post-entry-text-right">{!! $post->country !!}</div></div>
                <div class="post-entry"><div class="post-entry-text-left"></div>State<div class="post-entry-text-right">{!! $post->state !!}</div></div>
                <div class="post-rating"><div class="post-rating-text"></div>Rating<div class="post-entry-rating">{!! $post->rating !!}</div></div>
                <div class="post-summary">Summary</div>
                <div class="post-body">{!! $post->body !!}</div>
            </div>
        </div>
        <div style="clear: all"></div>
        <div class="line-small"></div>
        <div class="post-review">
            <div class="post-summary">Full Review</div>
            <div class="post-body">{{$post->body}}</div>
        </div>
        <div style="clear:both;"></div>
        @if (count($comments) > 0)
            <div class="line-small"></div>
            <div class="entry-summary" style="margin-top: 5px">Comments</div>
            <div class="comments">
                @foreach ($comments as $comment)
                    <div class="comment-body">
                        <div style="height: 30px; width:100%">
                            <div class="comment-author"><a class="comment-author-link"
                                    href="/userpage/{{ $comment->user->id }}">{{ $comment->user->name }}</a></div>
                            <div class="comment-time"> at {{ $comment->created_at }}</div>
                        </div>
                        <div style="clear: all"></div>
                        <div class="comment-text">{{ $comment->body }}</div>
                    </div>
                @endforeach
            </div>
        @endif



        @if (!Auth::guest())
            <div class="line-small"></div>
            {!! Form::model(['action' => ['App\Http\Controllers\PostController@comment', $post->id], 'method' => 'POST']) !!}
            @csrf
            <div class="comment-group">
                <div class="comment-label">Write a comment:</div>
                {{ Form::text('body', '', ['class' => 'comment-control', 'placeholder' => 'Comment']) }}
                {!! Form::submit('Submit', ['class' => 'comment-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
@endsection
