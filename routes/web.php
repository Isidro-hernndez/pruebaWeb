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

Route::get('/', function () {
    return redirect()->route('news_path');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas Noticias
Route::name('news_path')->get('/noticias', 'NewsController@index');

Route::name('news_create_path')->get('/noticias/crear', 'NewsController@create');
Route::name('news_store_path')->post('/noticias/crear', 'NewsController@store');
Route::name('news_edit_path')->get('/noticias/{noticia}/editar', 'NewsController@edit');
Route::name('news_update_path')->put('/noticias/{noticia}', 'NewsController@Update');
Route::name('news_delete_path')->delete('/noticias/{noticia}', 'NewsController@delete');


Route::name('new_path')->get('/noticias/{noticia}', 'NewsController@show');
