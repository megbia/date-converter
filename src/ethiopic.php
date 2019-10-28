<?php

namespace megbia\src;
require_once '/validation/ethiopicValidation.php';

class Ethiopic
{
    const JULIAN_DATE_OFFSET = 1723856;

    const MONTH_NAMES = [
        'መስከረም', 'ጥቅምት', 'ኅዳር', 'ታኅሣሥ', 'ጥር', 'የካቲት','መጋቢት', 'ሚያዝያ', 'ግንቦት', 'ሰኔ', 'ሐምሌ', 'ነሐሴ', 'ጳጉሜን',
    ];

    // $ethiopic_year = 2008
    // $ethiopic_month = 3;
    // $ethiopic_day = 12;

    //Checks whether ET Date is valid or not.


    public function ethiopicMonthLength($ethiopic_year,$ethiopic_month)
    {
        if ($ethiopian_month <= 12) return 30;
        if ($ethiopian_month == 13) return 5;

        if (self::isLeapEthiopianYear($ethiopic_year)) return 30;

        return 6;
    }

// isLeapEthiopianYear

    // public function isLeapEthiopianYear($value='')
    // {
    //     # code...
    // }

    public function gregorianToEthiopic($gregorian_year,$gregorian_month,$gregorian_day){

        $julianDate = gregoriantojd($gregorian_month, $gregorian_day, $gregorian_year);

        $r = self::mod(($julianDate - self::JULIAN_DATE_OFFSET), 1461)
        $n = self::mod($r, 365) + (365 * self::div($r,1460)) ;

        // year
        $ethiopian_year = 4 * self::div(($julianDate - self::JULIAN_DATE_OFFSET) , 1461 ) + self::div($r, 365)  - self::div($r, 1460);
        // month
        $ethiopian_month = self::div($n, 30) + 1;
        // day
        $ethiopian_day = self::mod($n, 30) + 1;

        $result = self::MONTH_NAMES[$ethiopian_month - 1] ." ".$ethiopian_day." ".$ethiopian_year;
        
        return $result;

    }

    //Gregorian from Julian Day
    public function ethiopicToGregorian($ethiopic_year,$ethiopic_month,$ethiopic_day){

        $n = 30 * ($ethiopian_month - 1 ) + ($ethiopian_day - 1); 

        $j = (self::JULIAN_DATE_OFFSET + 365) + 365 * ($ethiopian_year - 1) + self::div ($ethiopian_year , 4) + $n;

        $result = jdtogregorian($j);

        return $result;
    }

    //Division Function
    private function div($first, $second){
        return floor($first / $second);
    }

    //Modulo Function
    private function mod($first, $second){
        return ($first % $second);
    }
}
