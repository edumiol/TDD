<?php


use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testShouldCreateProduct(): void {
        $product = new Product('scissors',15.00);
        $exceptedResult = 'scissors';
        $this->assertEquals($exceptedResult, $product->getName());
    }

    public function testShoudCreateValueProduct(): void {
        $product = new Product('scissors',15.00);
        $exceptedResult = 15.00;
        $this->assertEquals($exceptedResult, $product->getValue());
    }
}
