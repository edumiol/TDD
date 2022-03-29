<?php


use App\CalculatorFreight;
use App\Cart;
use App\Product;
use PHPUnit\Framework\TestCase;

class PostalServiceTest extends TestCase
{
    public function testShouldSumCartTotalValue(): void {
        $product = new Product('blusa',200.00);
        $cart = new Cart('Barbara', '06135-170');
        $cart->addProduct($product,1);
        $freight = (new CalculatorFreight())->calculatorFreight('06342140');
        $sumValue = (new CalculatorFreight())->sumTotalValue($cart);
        $exceptedResult = 240.00;
        $this->assertEquals($exceptedResult, ($sumValue + $freight));
    }
}
