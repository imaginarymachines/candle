<?php

namespace Candles;

class ApiClient implements ServiceContract {

    protected $apiKey;

    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    public function getApiKey(){
        return $this->apiKey;
    }

    public static function register(Plugin $candle){
        $api = new \Candles\ApiClient(
            'key'
        );
        $candle->instance(\Candles\ApiClient::class, $api);
    }
}
