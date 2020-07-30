<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Illuminate\Http\Request;
use Rennokki\Larafy\Larafy;

class BuscaController extends Controller
{
    public function index()
    {
        return view('spotify/index');
    }
}