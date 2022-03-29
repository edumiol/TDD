<?php


use App\CalculatorFreight;
use App\Cart;
use App\Product;
use App\services\CalculatorService;
use App\User;
use PHPUnit\Framework\TestCase;

class PostalServiceTest extends TestCase
{
    public function testShouldSumCartTotalValue(): void {
        $zipCode = '06342140';
        $product = new Product('blusa',200.00);
        $user = new User('Barbara', $zipCode);
        $cart = new Cart($user);
        $cart->addProduct($product,1);

        $calculatorService = new CalculatorService(new CalculatorFreight());
        $freight  = $calculatorService->calculatorFreight($zipCode);

        $sumValue = $calculatorService->sumTotalCart($cart);

        $exceptedResult = 240.00;
        $this->assertEquals($exceptedResult, ($sumValue + $freight));
    }
}
