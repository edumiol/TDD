<?php

namespace App;

class CalculatorFreight implements Contracts\PostalService
{
    public function calculatorFreight(string $zipcode): int|float
    {
        $freights = [
         '06342140' => 40.00,
         '060110140' => 30.00,
         '054708452' => 70.00
       ];
        return $freights[$zipcode] ?? 0;
    }
}
