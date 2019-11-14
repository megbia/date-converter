<?php

namespace Megbia;

class DateConverter
{
    const JULIAN_DATE_OFFSET = 1723856;

    const MONTH_NAMES = [
        'መስከረም', 'ጥቅምት', 'ኅዳር', 'ታኅሣሥ', 'ጥር', 'የካቲት','መጋቢት', 'ሚያዝያ', 'ግንቦት', 'ሰኔ', 'ሐምሌ', 'ነሐሴ', 'ጳጉሜን',
    ];

    const GREGORIAN_MONTH_NAMES = [
        'January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December',
    ];


    /**
     * Converts Gregorian data to Ethiopian calender date
     *
     * @param $date: any valid php date string: e.g. 2019-01-01 12:33:11
     * @return string: Ethiopian calender date
     *
     */
    public function gregorianToEthiopian($date)
    {
        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $julianDate = gregoriantojd($month, $day, $year);
        $r = self::mod(($julianDate - self::JULIAN_DATE_OFFSET) ,1461);
        $n = self::mod($r, 365) + (365 * (self::div($r,1460)) );

        $ethiopian_year = 4 *  self::div( ($julianDate - self::JULIAN_DATE_OFFSET), 1461 ) + self::div( $r, 365 ) - self::div( $r, 1460 );
        $ethiopian_month = self::div($n, 30) + 1;
        $ethiopian_day = self::mod($n, 30) + 1;

        $result = self::MONTH_NAMES[$ethiopian_month - 1] ." ".$ethiopian_day."፣ ".$ethiopian_year;
        
        return $result;


    }


    /**
     * Converts Ethiopian calendar date to Gregorian date
     *
     * @param $date: any valid php date string: e.g. 2012-01-01 12:33:11
     * @return string: Gregorian date
     *
     */
    public function ethiopianToGregorian($date)
    {

        $day = date('d', strtotime($date));
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $n = 30 * ($month - 1 ) + ($day - 1);

        $j = (self::JULIAN_DATE_OFFSET + 365) + 365 * ($year - 1) + self::div($year, 4) + $n;

        $julianDayCount = jdtogregorian($j);

        $julianDate = explode('/', $julianDayCount);

        $gregorian_month = $julianDate[0];
        $gregorian_day   = $julianDate[1];
        $gregorian_year  = $julianDate[2];

        $result = self::GREGORIAN_MONTH_NAMES[$gregorian_month - 1] ." ".$gregorian_day." ".$gregorian_year;

        return $result;
    }



    /**
     * Division Function
     *
     * @param $first: number
     * @param $second: number
     * @return int
     */
    public function div($first, $second)
    {
        return ~~($first / $second);
    }



    /**
     * Modulo Function
     *
     * @param $first: number
     * @param $second: number
     * @return int
     */
    public function mod($first, $second)
    {
        return ($first % $second);
    }

}