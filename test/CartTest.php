<?php


use App\Cart;
use App\Product;
use App\User;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testWhatIsTheValueIfItIsEmpty(): void {

        $product = new Product('',0.00);
        $user = new User('Eduardo', '06342140');
        $cart = new Cart($user);
        $cart->addProduct($product, 1);
        $this->expectException(\InvalidArgumentException::class);
        $cart->sumProducts();
    }

    public function testShouldAddNewProducts(): void {
        $product = new Product('Ukulele Luthier', 1800.00);
        $user = new User('Eduardo', '06342140');
        $cart = new Cart($user);
        $cart->addProduct($product, 5);
        $exceptedResult = 9000.00;
        $this->assertEquals($exceptedResult,$cart->sumProducts());
    }

    public function testShouldAddProductsThatHaveAlreadyBeenAdded(): void {
        $product = new Product('Ukulele Luthier', 1800.00);
        $user = new User('Eduardo', '06342140');
        $cart = new Cart($user);
        $cart->addProduct($product, 5);
        $cart->addProduct($product, 1);
        $cart->addProduct($product, 2);
        $exceptedResult = 14400.00;
        $this->assertEquals($exceptedResult,$cart->sumProducts());
    }

    public function testShouldRemoveProduct(): void {
        $product = new Product('tênis',500.00);
        $user = new User('Maria', '06135110');
        $cart = new Cart($user);
        $cart->addProduct($product,3);
        $cart->removeProduct($product, 1);
        $exceptedResult = 1000.00;
        $this->assertEquals($exceptedResult,$cart->sumProducts());
    }

    public function testShouldAddTwoProductsAtTheSameTime(): void {
        $ukulele = new Product('Ukulele Luthier', 1800.00);
        $sneaker = new Product('tênis',500.00);
        $user = new User('Roberto', '06045113');
        $cart = new Cart($user);
        $cart->addProduct($ukulele,1);
        $cart->addProduct($sneaker,1);
        $exceptedResult = 2300.00;
        $this->assertEquals($exceptedResult,$cart->sumProducts());
    }

    public function testShoudZeroQuantityInCart(): void {
        $product = new Product('blusa',200.00);
        $user = new User('Barbara', '06135170');
        $cart = new Cart($user);
        $cart->addProduct($product,0);
        $this->expectException(\InvalidArgumentException::class);
        $cart->sumProducts();
    }
}
