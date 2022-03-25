<?php

namespace App\Utils;

use App\Contracts\NumberManagerInterface;

class NumbersManager implements NumberManagerInterface
{

    public function splitNumber(int|string $number): array
    {
        return str_split($number);
    }

    public function getSquareFromNumbers(array $numbers): array
    {
        return array_map(fn($value): int => pow($value, 2), $numbers);
    }
}