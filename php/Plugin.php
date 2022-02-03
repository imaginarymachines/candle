<?php

namespace Candles;

use Illuminate\Container\Container;
class Plugin extends Container
{

    public function sayHi(): string
    {
        return  'Hi Roy';
    }
}
