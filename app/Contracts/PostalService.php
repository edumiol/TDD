<?php

namespace App\Contracts;

interface PostalService
{
    public function calculatorFreight(string $zipcode): int|float;
}
