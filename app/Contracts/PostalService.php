<?php

namespace App\Contracts;

interface PostalService
{
    public function calculatorFreight(string $cep): int|float;
}