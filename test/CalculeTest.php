<?php

use PHPUnit\Framework\TestCase;
use App\Calcule;

class CalculeTest extends TestCase {

    protected function setUp() {
        $this->calcule = new Calcule();
    }

    public function testSumMultiplesOr() {

        $calcule = new Calcule(10);
        $sum = $calcule->multipleOr(3,5);

        $expectedResult = 12;

        $this->asserEquals($expectedResult, $sum);



    }







//    public function testSumMultiplesThreeOrFive() {
//        $this->assertEquals($this->calcule->multiplesThreeOrFive(), 233168);
//    }
//
//    public function testSumMultiplesThreeAndFive() {
//        $this->assertEquals($this->calcule->multiplesThreeAndFive(), 33165);
//    }
//
//    public function testSumMultiplesThreeOrFiveAndSeven() {
//        $this->assertEquals($this->calcule->multiplesThreeOrFiveAndSeven(), 33173);
//    }
//
//    /**
//     * @throws Exception
//     */
//    public function testException() {
//        $this->expectException(Exception::class);
//        $this->calcule->throwException();
//    }
}