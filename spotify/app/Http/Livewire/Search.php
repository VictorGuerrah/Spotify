<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Rennokki\Larafy\Larafy;

class Search extends Component
{
    public $value;
    public $artists;
    public $tracks;
    public $idA;

    public function render()
    {
        return view('livewire.search');
        
    }

    public function submit()
    {
        $this->validate(['value' => 'required']);

        $api = new Larafy();
        $data['artists'] = $data['tracks'] = array();
        

        try { 

            $artists = $api->searchArtists($this->value);
            $artists = json_decode(json_encode($artists), true);

            $tracks = $api->searchTracks($this->value);
            $tracks = json_decode(json_encode($tracks), true);

            if (!empty($artists['items'])){
                foreach ($artists['items'] as $key => $value) {
    
                    $data['artists'][] = [
                        'name' => isset($value['name']) ? $value['name'] : "",
                        'genre' => isset($value['genres'][0]) ? $value['genres'][0]: "",
                        'image' => isset($value['images'][0]['url']) ? $value['images'][0]['url']  : asset('img/no-image.png'),
                        'popularity' => isset($value['popularity']) ? $value['popularity'] : "",
                        'type' => isset($value['type']) ? $value['type'] : "",
                        'id' => isset($value['id']) ? $value['id']: "",
                        'followers' =>isset($value['followers']['total']) ? $value['followers']['total']: ""
                    ];

                    $this->idA[$key] = $value['id'];
                }
            }

            if (!empty($tracks['items'])){
                foreach ($tracks['items'] as $key => $value) {
    
                    $data['tracks'][] = [
                        'name' => isset($value['name']) ? $value['name'] : "",
                        'image' => isset($value['album']['images'][0]['url']) ? $value['album']['images'][0]['url'] : asset('img/no-image.png'),
                        'artist' => isset($value['artists'][0]['name']) ? $value['album']['artists'][0]['name']  : ""
                    ];
                }
            }

            $this->artists = $data['artists'];
            $this->tracks = $data['tracks'];

        } catch(\Rennokki\Larafy\Exceptions\SpotifyAuthorizationException $e) {
            $e->getAPIResponse();
        }
    }

    public function albuns($id) {
        return redirect()->to("/spotify/artist?id=$id");
    }

    public function like($info) {
        
    }
}
