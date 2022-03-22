<?php

use PHPUnit\Framework\TestCase;
use App\Calcule;

class CalculeTest extends TestCase {


    public static function providerMultiplesOrNumbers(): iterable {

        return [
                [
                    'operator' => 'or',
                    'max_value' => 1000,
                    'first_number' => 3,
                    'end_number' => 5,
                    'expected_result' => 233168
                ],
                [
                    'operator' => 'and',
                    'max_value' => 1000,
                    'first_number' => 3,
                    'end_number' => 5,
                    'expected_result' => 33165
                ],
                [
                    'operator' => 'or',
                    'max_value' => 1000,
                    'first_number' => 3,
                    'end_number' => 5,
                    'expected_result' => 33173,
                    'next_number' => 7,
                    'next_operator' => 'and'
                ],
        ];
    }

    /**
     * @dataProvider providerMultiplesOrNumbers
     */
    public function testSumMultiplesOr(string $operator, int $maxNumber, int $firstNumber, int $endNumber, int $expectedResult, int $thirdNumber = null, string $nextOperator = null) {

        $calcule = new Calcule($maxNumber);
        $sum = $calcule->multipleOr($operator,$firstNumber,$endNumber,$thirdNumber, $nextOperator);
        $this->assertEquals($expectedResult, $sum);
    }

    /**
     * @throws Exception
     */
    public function testValidateNumber() {
        $calcule = new Calcule(10);
        $this->expectException(\InvalidArgumentException::class);
        $calcule->validateNumber(1,2, -10);
    }
}