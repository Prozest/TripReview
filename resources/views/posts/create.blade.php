@extends('layouts.app')
@section('content')

    <div class="header">
        <div class="header-text">
            Create Post
        </div>
        <div class="line-big"></div>
    </div>

    @include('inc.messages')

    {!! Form::open(['action' => 'App\Http\Controllers\PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <div class="form-top">
            <div class="form-detailarea">
                <div class="form-entry">
                    <div class="form-title">{{ Form::label('resortname', 'Resort Name*') }}</div>
                    {{ Form::text('resortname', '', ['class' => 'form-control', 'placeholder' => 'Name of the Resort']) }}
                </div>
                <div class="form-entry">
                    <div class="form-title">{{ Form::label('country', 'Country*') }}</div>
                    {{ Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Name of the Country']) }}
                </div>
                <div class="form-entry">
                    <div class="form-title">{{ Form::label('state', 'State') }}</div>
                    {{ Form::text('state', '', ['class' => 'form-control', 'placeholder' => 'Name of the State']) }}
                </div>
                <div class="form-entry">
                    <div class="form-title">{{ Form::label('rating', 'Rating* (0-10)') }}</div>
                    {{ Form::input('number', 'rating', null, ['class' => 'form-control-rating']) }}
                </div>
                <div class="form-entry">
                    <div class="form-title">{{ Form::label('cover_image', 'Photo*') }}</div>
                    {{ Form::file('cover_image', ['class' => 'form-image-input']) }}

                </div>
            </div>
            <div class="form-summaryarea">
                <div class="form-entry-big">
                    <div class="form-title">{{ Form::label('summary', 'Summary*') }}</div>
                    {{ Form::textarea('summary', '', ['class' => 'form-control-big', 'placeholder' => 'Summary']) }}
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="form-entry-bottom">
            <div class="line-small"></div>
            <div class="form-entry-body">
                <div class="form-title-body">{{ Form::label('body', 'Body*') }}</div>
                {{ Form::textarea('body', '', ['class' => 'form-control-body', 'placeholder' => 'Tell us more about your journey']) }}
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="form-submit">
            {!! Form::submit('Submit', ['class' => 'form-submit-button']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
