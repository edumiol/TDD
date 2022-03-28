<?php


use App\Cart;
use App\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testWhatIsTheValueIfItIsEmpty(): void {
        $product = new Product('',0.00);
        $cart = new Cart('Eduardo', '06342-140');
        $cart->addProduct($product, 1);
        $this->expectException(\InvalidArgumentException::class);
        $cart->sumProducts($cart);
    }

    public function testShouldAddNewProducts(): void {
        $product = new Product('Ukulele Luthier', 1800.00);
        $cart = new Cart('Eduardo', '06342-140');
        $cart->addProduct($product, 5);
        $exceptedResult = 9000.00;
        $this->assertEquals($exceptedResult,$cart->sumProducts($cart));
    }

    public function testShouldAddProductsThatHaveAlreadyBeenAdded(): void {
        $product = new Product('Ukulele Luthier', 1800.00);
        $cart = new Cart('Eduardo', '06342-140');
        $cart->addProduct($product, 5);
        $cart->addProduct($product, 1);
        $cart->addProduct($product, 2);
        $exceptedResult = 14400.00;
        $this->assertEquals($exceptedResult,$cart->sumProducts($cart));
    }
}
