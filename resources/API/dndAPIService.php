<?php

use GuzzleHttp\Client;

function requisicao(){
    $url = 'https://www.dnd5eapi.co';
    $client = new Client();

    $client->getAsync($url . '/api/2014/classes')->then(
        function ($response) {
            $classes = json_decode($response->getBody(), true);
            foreach ($classes['results'] as $classe) {
                echo '<option value="' . $classe['index'] . '">' . $classe['name'] . '</option>';
            }
        }
    )->wait();
}

requisicao();