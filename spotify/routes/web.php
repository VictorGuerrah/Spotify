<?php

use Illuminate\Support\Facades\Route;

Route::get('/spotify', 'BuscaController@index');
Route::get('/spotify/artist', 'Artist@index');
