<?php

namespace services;

use App\Cart;
use App\Product;
use App\services\ServiceCart;
use App\User;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ServiceCartTest extends TestCase
{
    public function testSumTotalProduct(): void {
        $user = new User('Eduardo', '06342140');
        $cart = new Cart($user);
        $product = new Product('erase', 5.00);
        $cart->addProduct($product,2);
        $serviceCart = new ServiceCart($cart);
        $expectedResult = 50.00;
        $this->assertEquals($expectedResult, $serviceCart->sum());
    }

    public function testShouldThrowExceptionWhenNumbersAreLessThanOrEqualToZero(): void {
        $user = new User('Eduardo', '06342140');
        $cart = new Cart($user);
        $product = new Product('erase', 10.00);
        $cart->addProduct($product,0);
        $serviceCart = new ServiceCart($cart);
        $expectedResult = 50.00;
        $this->expectException(InvalidArgumentException::class);
        $this->assertEquals($expectedResult, $serviceCart->sum());
    }

    public function testShouldSumTotalGreaterThanOneHundredNothingFreight(): void {
        $user = new User('Eduardo', '06342140');
        $cart = new Cart($user);
        $product = new Product('erase', 10.00);
        $cart->addProduct($product,12);
        $serviceCart = new ServiceCart($cart);
        $expectedResult = 120.00;
        $this->assertEquals($expectedResult, $serviceCart->sum());
    }
}
