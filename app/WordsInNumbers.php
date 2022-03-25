<?php

namespace App;

use App\Utils\NumbersManager;

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

    public function getReportName(string $name): array
    {
        $sumName = $this->getSumName($name);
        $cousin  = $this->isNameCousin($sumName);
//        list($alphabetNumberUpper, $alphabetNumberLower) = $this->getNameNumber($name);
//        $sumNumber = array_filter(array_merge_recursive($alphabetNumberUpper, $alphabetNumberLower));
        $happyNumber = new HappyNumber(new NumbersManager());
        $multiple = $happyNumber->isHappyNumber($sumName);

        return [
            [
                'name' => $name,
                'cousin' => $cousin,
                'multiple' => $multiple == 1 ? 'Feliz' : 'Triste'
            ]
        ];
    }

    public function isNameCousin(int $number): bool
    {
        $one = 1;
        return $number > 1 && $number % $number === 0 && $number % $one === 0;
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
        $alphabetNumberUpper = array_map(fn($value): int => array_search($value, $alphabetUpper), $data);
        $alphabetNumberLower = array_map(fn($value): int => array_search($value, $alphabetLower), $data);
        return array($alphabetNumberUpper, $alphabetNumberLower);
    }

}