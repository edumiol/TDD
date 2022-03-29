<?php

namespace App\services;

use App\Cart;
use App\Contracts\PostalService;

class CalculatorService
{

    public PostalService $postalService;

    public function __construct(PostalService $postalService)
    {
        $this->postalService = $postalService;
    }

    public function calculatorFreight(string $zipCode): int|float
    {
        return $this->postalService->calculatorFreight($zipCode);
    }

    public function sumTotalCart(Cart $cart): int|float
    {
        return $cart->sumProducts();
    }

}