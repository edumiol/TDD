<?php

namespace App;

use App\Utils\NumbersManager;
use App\Utils\TraitWords;

class WordsInNumbers
{
    public function getLowercaseNumbers(): array
    {
        return array_combine(range(1, 26), range('a', 'z'));
    }

    public function getUppercaseNumbers(): array
    {
        return array_combine(range(27, 52), range('A', 'Z'));
    }

    public function getNameReport(string $name): array
    {
        $traitWords = new TraitWords();
        $name = $traitWords->postSlug($name);
        $sumName = $this->getSumName($name);
        $cousin  = $this->isNameCousin($sumName);

        $happyNumber = new HappyNumber(new NumbersManager());
        $number = $happyNumber->isHappyNumber($sumName);

        $calculator = new Calculator($sumName);
        $multiple = $calculator->multiple('or', 3, 5);

        return [
            'name' => $name,
            'cousin' => $cousin,
            'number' => $number == 1 ? 'Happy' : 'Sad',
            'multiple' => $multiple
        ];
    }

    public function isNameCousin(int $number): bool
    {
        $cousins = [];
        for ($i = 1; $i <= $number; $i++) {
            $dividers = 0;
            for ($j = $i; $j >= 1; $j--) {
                if (($i % $j) == 0) {
                    $dividers++;
                }
            }
            if ($dividers == 2) {
                $cousins[] = $i;
            }
        }
        return count($cousins) > 0;
    }

    public function getSumName(string $name): int
    {
        $sumNumber = [];
        list($alphabetNumberUpper, $alphabetNumberLower) = $this->getNameNumber($name);
        return array_sum(array_filter(array_merge_recursive($alphabetNumberUpper, $alphabetNumberLower, $sumNumber)));
    }

    public function getNameNumber(string $name): array
    {
        $alphabetUpper = $this->getUppercaseNumbers();
        $alphabetLower = $this->getLowercaseNumbers();
        $number = new HappyNumber(new NumbersManager());

        $data = $number->numberManager->splitNumber($name);
        $alphabetNumberUpper = array_map(fn ($value): int => array_search($value, $alphabetUpper), $data);
        $alphabetNumberLower = array_map(fn ($value): int => array_search($value, $alphabetLower), $data);
        return array($alphabetNumberUpper, $alphabetNumberLower);
    }
}
