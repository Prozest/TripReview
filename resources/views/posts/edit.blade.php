@extends('layouts.app')
@section('content')

    <div class="header">
        <div class="header-text">
            Edit Post
        </div>
        <div class="line-big"></div>
    </div>

    @include('inc.messages')

    {!! Form::model($post, ['action' => ['App\Http\Controllers\PostController@update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <div class="form-entry">
            <div class="form-title">{{ Form::label('title', 'Title*')}}</div>
            {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>
        <div class="form-entry">
            <div class="form-title">{{ Form::label('body', 'Body*')}}</div>
            {{ Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
        </div>
        <div class="form-entry-big">
            <div class="form-title">{{ Form::label('cover_image', 'Photo*')}}</div>
            {{ Form::file('cover_image') }}
        </div>
        <div class="form-submit">
            {!! Form::submit('Edit', ['class' => 'form-submit-button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
