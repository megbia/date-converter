<?php

namespace megbia\src;
// require_once '/validation/ethiopicValidation.php';
// use '/dateValidation.php';

class Ethiopic
{
    const JULIAN_DATE_OFFSET = 1723856;

    const MONTH_NAMES = [
        'መስከረም', 'ጥቅምት', 'ኅዳር', 'ታኅሣሥ', 'ጥር', 'የካቲት','መጋቢት', 'ሚያዝያ', 'ግንቦት', 'ሰኔ', 'ሐምሌ', 'ነሐሴ', 'ጳጉሜን',
    ];

    const GREGORIAN_MONTH_NAMES = [
        'January', 'February', 'March', 'April', 'May', 'June','July', '    August', 'September', 'October', '  November', 'December', 
    ];

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

    public function gregorianToEthiopic($year,$month,$day){

        $julianDate = gregoriantojd($month, $day, $year);
        $r = self::mod(($julianDate - self::JULIAN_DATE_OFFSET) ,1461);
        $n = self::mod($r, 365) + (365 * (self::div($r,1460)) );

        // year
        $ethiopian_year = 4 *  self::div( ($julianDate - self::JULIAN_DATE_OFFSET), 1461 ) + self::div( $r, 365 ) - self::div( $r, 1460 );
        // month
        $ethiopian_month = self::div($n, 30) + 1;
        // day
        $ethiopian_day = self::mod($n, 30) + 1;

        $result = self::MONTH_NAMES[$ethiopian_month - 1] ." ".$ethiopian_day." ".$ethiopian_year;
        
        return $result;


    }

    //Gregorian from Julian Day
    public function ethiopicToGregorian($ethiopic_year,$ethiopic_month,$ethiopic_day){

       $n = 30 * ($ethiopic_month - 1 ) + ($ethiopic_day - 1); 

        $j = (self::JULIAN_DATE_OFFSET + 365) + 365 * ($ethiopic_year - 1) + self::div($ethiopic_year, 4) + $n;

        $julianDayCount = jdtogregorian($j);

        $juilianDate = explode('/', $julianDayCount);

        $gregorian_month = $juilianDate[0];
        $gregorian_day   = $juilianDate[1];
        $gregorian_year  = $juilianDate[2];

        $result = self::GREGORIAN_MONTH_NAMES[$gregorian_month - 1] ." ".$gregorian_day." ".$gregorian_year;

        return $result;
    }

    //Division Function
    public function div($first, $second){
        return ~~($first / $second);
    }

    //Modulo Function
    public function mod($first, $second){
        return ($first % $second);
    }

}

// $output = new Ethiopic();
// print_r ($output->gregorianToEthiopic(2019,10,29));
// echo "<br>";
// print_r ($output->ethiopicToGregorian(2012,2,18));
// echo "<br>";
// print_r ($output->div(2012,18));
// echo "<br>";
// print_r ($output->mod(2012,18));