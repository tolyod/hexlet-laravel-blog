@extends('layouts.app')

@section('header', 'Edit Article')

@section('content')
    {{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
        @include('article.form')
        {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
