<?php

use App\Cart;
use App\Product;
use App\Observers\LogFile;
use App\Observers\LogSum;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase {

    public function setUp() {
        $this->cart = new Cart([]);
        $this->observerLogSum = new LogSum();
        $this->observerLogFile = new LogFile($this->fileName);

        $this->cart->attach($this->observerLogSum);
        $this->cart->attach($this->observerLogFile);
    }

    public function testByProduct($product, $quantity): void {

        $this->cart->buy($product, $quantity);

        $this->assertEquals($this->observerSum->getStorage(), $this->cart->total());
        $this->assertEquals($this->observerFile->getStorage(), $this->cart->total());
    }

    public function testRestoreProduct() {
        $raspberry = new Product('raspberry', 13);
        
        $this->cart->buy($apple, 10);

        $this->assertEquals()
    }

    public function testDettachObserver() {

    }

    public function testResetProduct() {

    }

    public function productList(): array {
        return [
            [new Product('product 1', 10), 2],
            [new Product('product 2', 20), 1]
        ]
    }

}