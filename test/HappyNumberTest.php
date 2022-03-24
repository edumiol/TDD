<?php


use App\HappyNumber;
use App\Utils\NumbersManager;
use PHPUnit\Framework\TestCase;
use App\Contracts\NumberManagerInterface;

class HappyNumberTest extends TestCase
{

    public function testHappyNumber(): void {
        $happyNumbers = [1, 7, 10, 13, 19, 23, 28, 31, 32, 44, 49];
        $happyNumber = new HappyNumber(new NumbersManager());
        foreach ($happyNumbers as $number) {
            $this->assertTrue($happyNumber->isHappyNumber($number));
        }
    }

    public function testSadNumber(): void {
        $happyNumbers = [2, 6, 11, 14, 20, 24, 29, 33, 34, 45, 50];
        $happyNumber = new HappyNumber(new NumbersManager());
        foreach ($happyNumbers as $number) {
            $this->assertFalse($happyNumber->isHappyNumber($number));
        }
    }

    public function testShouldImplementsInterfaces(): void {
        $numberManager = new NumbersManager();
        $this->assertInstanceOf(NumberManagerInterface::class, $numberManager);
    }

    public function testShouldThrowExceptionWhenNumbersIsNegative(): void {
        $happyNumbers = [-1, -7, -10, -13, -19, -23, -28, -31, -32, -44, -49];
        $happyNumber = new HappyNumber(new NumbersManager());
        $this->expectException(InvalidArgumentException::class);
        foreach ($happyNumbers as $number) {
            $this->assertTrue($happyNumber->isHappyNumber($number));
        }
    }

}
