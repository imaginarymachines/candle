<?php

namespace Candles;

class Product implements ServiceContract {

    public $name;

    public function __construct($name){
        $this->name = $name;
    }

    public static function register(Plugin $candle){
        $candle->bind( Product::class, function($plugin,$args){
            return new Product(...$args);
        });
    }
}
