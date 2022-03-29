<?php

namespace App;

class CalculatorService
{

    public CalculatorService $postalService;

    public function __construct(CalculatorService $postalService)
    {
        $this->postalService = $postalService;
    }



}