<?php

namespace App;

use Exception;

class Calcule  {

    private $max_value;

    public function __construct(int $max_value )
    {
        $this->max_value = $max_value;
    }

//    public function multiplesThreeOrFive(): int {
//        return array_sum(array_filter(range(1,999), function($num){
//            return ($num % 3 == 0 || $num % 5 == 0) ? $num : '';
//        }));
//    }
//
//    public function multiplesThreeAndFive(): int {
//        return array_sum(array_filter(range(1,999), function($num){
//            return ($num % 3 == 0 && $num % 5 == 0) ? $num : '';
//        }));
//    }
//
//    public function multiplesThreeOrFiveAndSeven(): int {
//        return array_sum(array_filter(range(1,999), function($num){
//            return (($num % 3 == 0 || $num % 5 == 0) && $num % 7 == 0)  ? $num : '';
//        }));
//    }
//
//    /**
//     * @throws Exception
//     */
//    function throwException() {
//        throw new Exception("Numbers greater than zero");
//    }


}