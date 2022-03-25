<?php

namespace App\Contracts;

interface NumberManagerInterface
{
    public function splitNumber(int|string $number): array;
    public function getSquareFromNumbers(array $numbers): array;
}