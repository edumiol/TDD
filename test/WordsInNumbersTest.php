<?php


use App\Utils\TraitWords;
use App\WordsInNumbers;
use PHPUnit\Framework\TestCase;

class WordsInNumbersTest extends TestCase
{
    public function testShouldBringLowercaseAlphabet(): void {
        $wordsNumbers = new WordsInNumbers();
        $expectedResult = [
                1 => 'a',
                2 => 'b',
                3 => 'c',
                4 => 'd',
                5 => 'e',
                6 => 'f',
                7 => 'g',
                8 => 'h',
                9 => 'i',
                10 => 'j',
                11 => 'k',
                12 => 'l',
                13 => 'm',
                14 => 'n',
                15 => 'o',
                16 => 'p',
                17 => 'q',
                18 => 'r',
                19 => 's',
                20 => 't',
                21 => 'u',
                22 => 'v',
                23 => 'w',
                24 => 'x',
                25 => 'y',
                26 => 'z'
        ];

        $this->assertEquals($expectedResult, $wordsNumbers->getLowercaseNumbers());
    }

    public function testShouldBringUppercaseAlphabet(): void {
        $wordsNumbers = new WordsInNumbers();
        $expectedResult = [
                27 => 'A',
                28 => 'B',
                29 => 'C',
                30 => 'D',
                31 => 'E',
                32 => 'F',
                33 => 'G',
                34 => 'H',
                35 => 'I',
                36 => 'J',
                37 => 'K',
                38 => 'L',
                39 => 'M',
                40 => 'N',
                41 => 'O',
                42 => 'P',
                43 => 'Q',
                44 => 'R',
                45 => 'S',
                46 => 'T',
                47 => 'U',
                48 => 'V',
                49 => 'W',
                50 => 'X',
                51 => 'Y',
                52 => 'Z'
        ];

        $this->assertEquals($expectedResult, $wordsNumbers->getUppercaseNumbers());
    }

    public function testShouldSearchName(): void {
        $wordsNumbers = new WordsInNumbers();
        $expectedResult = [
            [
                'name' => 'Eduardo',
                'cousin' => true,
                'number' => 'Happy',
                'multiple' => 2028
            ],
            [
                'name' => 'Monica',
                'cousin' => true,
                'number' => 'Sad',
                'multiple' => 1508
            ],
            [
                'name' => 'Fernando',
                'cousin' => true,
                'number' => 'Happy',
                'multiple' => 2520
            ],
        ];

        foreach ($expectedResult as $expect) {
            $this->assertEquals($expect, $wordsNumbers->getNameReport($expect['name']));
        }
    }

    public function testShouldGetSumName(): void {
        $traitWords = new TraitWords();
        $wordsNumbers = new WordsInNumbers();
        $expectedResult = 94;
        $this->assertEquals($expectedResult, $wordsNumbers->getSumName($traitWords->postSlug('Eduardo')));
    }

    public function testShouldInformIfTheNameIsCousin(): void {
        $traitWords = new TraitWords();
        $wordsNumbers = new WordsInNumbers();
        $isCousin = $wordsNumbers->isNameCousin($wordsNumbers->getSumName($traitWords->postSlug('Eduardo')));
        $this->assertTrue($isCousin);
    }
}
