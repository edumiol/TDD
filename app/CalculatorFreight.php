<?php

namespace App;

class CalculatorFreight implements Contracts\PostalService
{

    public function calculatorFreight(string $cep): int|float
    {
       $freights = [
         '06342140' => 40.00,
         '060110140' => 30.00,
         '054708452' => 70.00
       ];
       return $freights[$cep] ?? 0;
    }

    public function sumTotalValue(Cart $cart): int|float
    {
        $sumProducts = [];
        $products = $cart->getProducts();
        $items[] = $cart->getItems();
        foreach ($products as $product) {
            foreach ($items as $item) {
                $quantity = $cart->getItem($item, $product);
                $this->validateNumber($quantity, $product->getValue());
            }
            $sumProducts[$cart->treatName($product)] = $quantity * $product->getValue();
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