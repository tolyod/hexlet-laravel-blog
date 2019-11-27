<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <!-- BEGIN (write your solution here) -->
        <a href="/about">About</a>
        <a href="{{ route('articles.index', null, false) }}">Articles</a>
        <!-- END -->
    </body>
</html>
