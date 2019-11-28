<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$team = [
    ['name' => 'Hodor', 'position' => 'programmer'],
    ['name' => 'Joker', 'position' => 'CEO'],
    ['name' => 'Elvis', 'position' => 'CTO'],
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', 'PageController@about');

Route::get('/articles/create', 'ArticleController@create')
  ->name('articles.create');

Route::post('/articles', 'ArticleController@store')
  ->name('articles.store');

// Название сущности в URL во множественном числе, контроллер в единственном
Route::get('/articles', 'ArticleController@index')
    ->name('articles.index'); // имя маршрута, нужно для того чтобы не создавать ссылки руками

// Метод PATCH
Route::patch('/articles/{id}', 'ArticleController@update')
  ->name('articles.update');

Route::get('/articles/{id}/edit', 'ArticleController@edit')
    ->name('articles.edit');

Route::get('/articles/{id}', 'ArticleController@show')
  ->name('articles.show');

Route::delete('/articles/{id}', 'ArticleController@destroy')
  ->name('articles.destroy');
