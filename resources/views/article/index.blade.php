@extends('layouts.app')

@section('header', 'Статьи')

@section('content')
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <p>
            <small>
                <a href="{{ route('articles.show', $article ) }}">
                    #
                </a>
                <a href="{{ route('articles.edit', $article ) }}">
                   edit
                </a>
            </small>
        </p>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
