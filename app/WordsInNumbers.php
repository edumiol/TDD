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

    public function removeAccent(string $str): string {
        $letterWithAccent = [
            'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó',
            'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é',
            'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā',
            'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ',
            'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ',
            'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ',
            'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ',
            'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ',
            'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż',
            'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ',
            'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ'
        ];
        $letterWithoutAccent = [
            'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O',
            'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e',
            'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A',
            'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E',
            'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I',
            'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L',
            'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe',
            'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't',
            'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z',
            'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U',
            'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o'
        ];

        return str_replace($letterWithAccent, $letterWithoutAccent, $str);
    }

    public function postSlug(string $str): string {
        return preg_replace(array('/[^a-zA-Z]/', '/[ -]+/', '/^-|-$/'),
            array('', '', '',"'"), $this->removeAccent($str));
    }

    public function getNameReport(string $name): array
    {
        $name = $this->postSlug($name);
        $sumName = $this->getSumName($name);
        $cousin  = $this->isNameCousin($sumName);

        $happyNumber = new HappyNumber(new NumbersManager());
        $number = $happyNumber->isHappyNumber($sumName);

        $calculator = new Calculator($sumName);
        $multiple = $calculator->multiple('or',3,5);

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
        for($i = 1; $i <= $number; $i++) {
            $dividers = 0;
            for($j = $i; $j >= 1; $j--) {
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
        $alphabetNumberUpper = array_map(fn($value): int => array_search($value, $alphabetUpper), $data);
        $alphabetNumberLower = array_map(fn($value): int => array_search($value, $alphabetLower), $data);
        return array($alphabetNumberUpper, $alphabetNumberLower);
    }

    public function debug(string|array $data, bool $active = true, bool $stop = false): void
    {
        if ($active) {
            print_r($data);
            echo "\n";
            echo "\n";
        }

        if ($stop) {
            die('stop with debug!');
        }
    }

}