<?php
/** Actions and Filters **/

//Register services
add_action( 'candle', [
    \Candles\ApiClient::class,
    'register'
]);
add_action( 'candle', [
    \Candles\Product::class,
    'register'
]);
