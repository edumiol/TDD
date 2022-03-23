<?php

namespace App;

class Calcule  {

    private int $endValue;

    public function __construct(int $endValue)
    {
        $this->endValue = $endValue;
    }

    public function multipleOr(string $operator, int $first, int $second, int $third = null, string $nextOperator = null): int|float
    {
        $this->validateNumber($first, $second, $third ?? 0);
        $startValue = 0;
        $numbers =  $this->createRange($startValue,$this->endValue);
        $params = ['start' => $first, 'end' => $second, 'next' => $third, 'operator' => $operator, 'next_operator' => $nextOperator];
        $multiples = $this->multiplesOf($numbers, $params);

        return $this->multiplesSum($multiples);
    }


    /**
     * @param int $start
     * @param int $end
     * @return array<int>
     */
    private function createRange(int $start, int $end): array
    {
        return range($start, ($end-1));
    }

    /**
     * @param array<int> $numbers
     * $params = ['start' => $first, 'end' => $second, 'next' => $third, 'operator' => $operator, 'next_operator' => $nextOperator];
     * @param array{start: int, end: int, next: ?int, operator: string, next_operator: ?string} $params
     * @return array<int>
     */
    private function multiplesOf(array $numbers, array $params): array
    {
        $multiples = [];
        foreach ($numbers as $number) {
            if(empty($params['next'])) {
                switch ($params['operator']) {
                    case 'or':
                        $multiples[] = ($number % $params['start'] == 0 || $number % $params['end'] == 0) ? $number : '';
                        break;
                    case 'and':
                        $multiples[] = ($number % $params['start'] == 0 && $number % $params['end'] == 0) ? $number : '';
                        break;
                }
            } else {
                switch ($params['next_operator']) {
                    case 'or':
                        $multiples[] = ($number % $params['start'] == 0 || $number % $params['end'] == 0 || $number % $params['next'] == 0) ? $number : '';
                        break;
                    case 'and':
                        $multiples[] = (($number % $params['start'] == 0 || $number % $params['end'] == 0) && $number % $params['next'] == 0) ? $number : '';
                        break;
                }
            }
        }

        return array_filter($multiples);
    }

    /**
     * @param array<int> $numbers
     * @return int
     */
    private function multiplesSum(array $numbers): int
    {
        return array_sum($numbers);
    }

    public function validateNumber(int $first, int $second, int $third): void
    {
        if($first < 0 || $second < 0 || $third < 0) {
            throw new \InvalidArgumentException('First and Second number most be greater than zero.');
        }
    }

}