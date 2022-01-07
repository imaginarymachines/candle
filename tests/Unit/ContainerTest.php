<?php


namespace Candles\Tests\Unit;
use Candles\Plugin;
use Candles\Product;
use Candles\ApiClient;

use Brain\Monkey\Functions;


class ContainerTest extends TestCase {


    public function testContainer() {
        $plugin = new Plugin();
        $plugin->bind( Product::class, function($plugin,$args){
            return new Product(...$args);
        });
        $this->assertInstanceOf(
            Product::class,
            $plugin->make(Product::class,['name'])
        );
        $this->assertEquals(
            'test2',
            $plugin->make(Product::class,['test2'])->name
        );
        $this->assertEquals(
            $plugin->make(Product::class,['name']),
            $plugin->make(Product::class,['name'])
        );

        $this->assertNotSame(
            $plugin->make(Product::class,['name']),
            $plugin->make(Product::class,['name'])
        );
    }

    public function testApiClient() {
        $plugin = new Plugin();
        $api = new ApiClient(
            'key'
        );
        $plugin->instance(ApiClient::class, $api);
        $this->assertInstanceOf(
            ApiClient::class,
            $plugin->make(ApiClient::class)
        );
        $this->assertSame(
            'key',
            $plugin->make(ApiClient::class)->getApiKey(),
        );

        $this->assertEquals(
            $plugin->make(ApiClient::class),
            $plugin->make(ApiClient::class)
        );

        $this->assertSame(
            $plugin->make(ApiClient::class),
            $plugin->make(ApiClient::class)
        );
    }
}
