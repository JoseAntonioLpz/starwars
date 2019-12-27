<?php

namespace App\Http\Classes;

use GuzzleHttp\Client;

class ApiRequest{
    
    static function get($url, $params = array())
    {
        $client = new Client();
        $url;
        $res = $client->request('GET', $url, $params);
        
        return json_decode($res->getBody(), true);
    }
}