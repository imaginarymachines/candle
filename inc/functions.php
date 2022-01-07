<?php
/** Functions **/

function candle(){
    static $candle;
    if( ! $candle ){
        $candle = new \Candles\Plugin();
        do_action( "candle", $candle );
    }
    return $candle;
}

add_action( 'candle', function($candle){
    $api = new \Candles\ApiClient(
        'key'
    );
    $candle->instance(\Candles\ApiClient::class, $api);
});

add_action( 'candle', function($candle){
    $candle->bind( \Candles\Product::class, function($plugin,$args){
        return new \Candles\Product(...$args);
    });
});
