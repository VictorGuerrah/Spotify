<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscaController extends Controller
{
    public function index(Request $request)
    {
        return view('spotify/index');
    }
    public function pesquisar(Request $request)
    {
       $valor = $request->busca;
    }
}