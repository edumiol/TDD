<?php

namespace App;

class Calcule  {

    private $endValue;

    public function __construct(int $endValue)
    {
        $this->endValue = $endValue;
    }

    public function multipleOr(string $operator, int $first, int $second, int $third = null, string $nextOperator = null): int
    {
        $this->validateNumber($first, $second, $third);
        $startValue = 0;
        $numbers =  $this->createRange($startValue,$this->endValue);
        $arrayFirst = $this->multiplesOf($numbers, $first);
        $arraySecond = $this->multiplesOf($numbers, $second);

        $multiples = $this->handlerData($arrayFirst,$arraySecond, $operator);

        if(!empty($third) && !empty($nextOperator)) {
            $arrayThird = $this->multiplesOf($numbers, $third);
            $multiples  = $this->handlerData($multiples,$arrayThird, $nextOperator);
        }

        return $this->multiplesSum($multiples);
    }

    private function createRange(int $start, int $end): array
    {
        return range($start, ($end-1));
    }

    private function multiplesOf(array $numbers, int $multiple): array
    {
        $multiples = [];
        foreach ($numbers as $number) {
            if($number % $multiple == 0) {
                $multiples[] = $number;
            }
        }
        return $multiples;
    }

    private function multiplesSum(array $numbers): int
    {
        return array_sum($numbers);
    }

    private function handlerData(array $arrayFirst, array $arraySecond, string $operator): array
    {
        $data = [];
        if($operator === 'or') {
            $data = array_unique(array_merge($arrayFirst,$arraySecond));
        }
        if($operator === 'and') {
            $data = array_intersect($arrayFirst,$arraySecond);
        }
        return $data;
    }

    public function validateNumber(int $first, $second, $third)
    {
        if($first < 0 || $second < 0 || $third < 0) {
            throw new \InvalidArgumentException('First and Second number most be greater than zero.');
        }
    }

}