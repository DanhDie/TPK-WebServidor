<?php

use GuzzleHttp\Client;

function requisicao(){
    $url = 'https://www.dnd5eapi.co';
    $client = new Client();
    $resultado = [];

    $client->getAsync($url . '/api/2014/classes')->then(    
        function ($response) use (&$resultado){
            $classes = json_decode($response->getBody(), true);
            $resultado = $classes['results'];
        }
    )->wait();

    return $resultado;
}

requisicao();