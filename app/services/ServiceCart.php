<?php

namespace App\services;

use App\Cart;

class ServiceCart
{
    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function sum(): float
    {
        $cart = $this->cart;
        $sumProducts = [];
        $products = $cart->getProducts();
        $items[] = $cart->getItems();

        foreach ($products as $product) {
            foreach ($items as $item) {
                $quantity = $cart->getItem($item, $product);
                $this->validateNumber($quantity, $product->getValue());
                $sumProducts[$cart->treatName($product)] = $quantity * $product->getValue();
            }
        }
        return array_sum($sumProducts);
    }

    public function validateNumber(int $item, float $value): void
    {
        if($item <= 0 || $value <= 0) {
            throw new \InvalidArgumentException('Item and value cannot be zero.');
        }
    }


}