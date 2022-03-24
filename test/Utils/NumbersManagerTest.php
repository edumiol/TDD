<?php


use App\Utils\NumbersManager;
use PHPUnit\Framework\TestCase;

class NumbersManagerTest extends TestCase
{
    public function testShouldSplitNumber(): void
    {
        $data = [
            [
                'number' => 49,
                'expectedResult' => [4,9]
            ],
            [
                'number' => 22,
                'expectedResult' => [2,2]
            ], [
                'number' => 168,
                'expectedResult' => [1,6,8]
            ],
        ];

        foreach ($data as $provider) {
            $this->assertEquals($provider['expectedResult'], (new NumbersManager())->splitNumber($provider['number']));
        }
    }

    public function testShouldSquareFromNumbers(): void
    {
        $data = [2,4,5,50];

        $this->assertEquals([4,16,25,2500], (new NumbersManager())->getSquareFromNumbers($data));
    }

}
