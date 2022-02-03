<?php
namespace Candles\Tests\Integration;


use Candles\Plugin;
use Candles\ApiClient;
use Candles\Product;

class ContainerTest extends TestCase {

    public function testAccesorFunction(){
        $this->assertInstanceOf(
            Plugin::class,
            candle()
        );
        $this->assertSame(
            candle(),
            candle()
        );
    }

    public function testApiClient() {
        $this->assertInstanceOf(
            ApiClient::class,
            candle()->make(ApiClient::class)
        );

    }

    public function testProduct(){
        $this->assertInstanceOf(
            Product::class,
            candle()->make(Product::class,['name'])
        );
        $this->assertEquals(
            'test2',
            candle()->make(Product::class,['test2'])->name
        );
    }
}
