<?php

namespace Candles;

class ApiClient {

    protected $apiKey;

    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    public function getApiKey(){
        return $this->apiKey;
    }
}
