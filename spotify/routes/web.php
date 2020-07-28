<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/spotify', 'BuscaController@index');
Route::post('/spotify/search', 'BuscaController@pesquisar');
