@extends('layouts.app')

@section('header', 'New Article')

@section('content')
    {{ Form::model($article, ['url' => route('articles.store')]) }}
        @include('article.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
