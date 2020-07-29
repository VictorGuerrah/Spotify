<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rennokki\Larafy\Larafy;

class BuscaController extends Controller
{
    public function index(Request $request)
    {
        return view('spotify/index');
    }
    
    public function pesquisar(Request $request)
    {
        $api = new Larafy();
        $data = false;

        try { 
            $return = $api->searchArtists($request->valor);
            $return = json_decode(json_encode($return), true);

            if (!empty($return['items'])){
                foreach ($return['items'] as $key => $value) {
    
                    $data[] = [
                        'name' => isset($value['name']) ? $value['name'] : "",
                        'genre' => isset($value['genres'][0]) ? $value['genres'][0]: "",
                        'image' => isset($value['images'][0]['url']) ? $value['images'][0]['url']  : asset('img/no-image.png'),
                        'popularity' => isset($value['popularity']) ? $value['popularity'] : "",
                        'type' => isset($value['type']) ? $value['type'] : "",
                        'followers' =>isset($value['followers']['total']) ? $value['followers']['total']: ""
                    ];
                }
            }

            return view('spotify/index', compact('data'));
        } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
            $e->getAPIResponse();
        }
    }
}