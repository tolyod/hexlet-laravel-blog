@extends('layouts.app')

@section('header', $article->name)

@section('content')
        <h2>{{$article->name}}</h2>
        <div>{{$article->body}}</div>
@endsection
