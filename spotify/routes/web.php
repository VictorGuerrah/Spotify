<?php

use Illuminate\Support\Facades\Route;

Route::get('/spotify', 'BuscaController@index');
Route::post('/spotify', 'BuscaController@pesquisar');
