<?php

namespace App;

use App\Contracts\NumberManagerInterface;
use InvalidArgumentException;

class HappyNumber
{
    public NumberManagerInterface $numberManager;
    public function __construct(NumberManagerInterface $numberManager)
    {
        $this->numberManager = $numberManager;
    }

    public function isHappyNumber(int $number = 0, array $readyPass = []): bool
    {
        $this->validateNumberNegative($number);
        $numbers = $this->numberManager->splitNumber($number);
        $squareNumbers = $this->numberManager->getSquareFromNumbers($numbers);
        $sumOfSquareNumbers = array_sum($squareNumbers);

        if (in_array($sumOfSquareNumbers, $readyPass)) {
            return false;
        }
        if ($sumOfSquareNumbers === 1) {
            return true;
        }

        $readyPass[] = $sumOfSquareNumbers;

        return $this->isHappyNumber($sumOfSquareNumbers, $readyPass);
    }

    public function validateNumberNegative(int $number): void
    {
        if ($number < 0) {
            throw new InvalidArgumentException();
        }
    }
}
