<?php


use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testShouldCreateUser(): void {
        $user = new User('Eduardo', '06342140');
        $expectedResult = 'Eduardo';
        $this->assertEquals($expectedResult, $user->getName());
    }

    public function testShouldCreateZipCodeUser(): void {
        $user = new User('Eduardo', '06342140');
        $expectedResult = '06342140';
        $this->assertEquals($expectedResult, $user->getZipCode());
    }
}
