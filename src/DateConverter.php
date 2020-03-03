<?php

namespace Megbia;

class DateConverter
{
    protected $julian_date_offset = 1723856;

    protected $et_monthNames = [
        'መስከረም',
        'ጥቅምት',
        'ኅዳር',
        'ታኅሣሥ',
        'ጥር',
        'የካቲት',
        'መጋቢት',
        'ሚያዝያ',
        'ግንቦት',
        'ሰኔ',
        'ሐምሌ',
        'ነሐሴ',
        'ጳጉሜ',
    ];

    protected $eu_monthNames = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
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
        $r = $this->mod(($julianDate - $this->julian_date_offset) ,1461);
        $n = $this->mod($r, 365) + (365 * ($this->div($r,1460)) );

        $ethiopian_year = 4 *  $this->div( ($julianDate - $this->julian_date_offset), 1461 ) + $this->div( $r, 365 ) - $this->div( $r, 1460 );
        $ethiopian_month = $this->div($n, 30) + 1;
        $ethiopian_day = $this->mod($n, 30) + 1;

        $result = $this->et_monthNames[$ethiopian_month - 1] ." ".$ethiopian_day."፣ ".$ethiopian_year;

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

        $j = ($this->julian_date_offset + 365) + 365 * ($year - 1) + $this->div($year, 4) + $n;

        $julianDayCount = jdtogregorian($j);

        $julianDate = explode('/', $julianDayCount);

        $gregorian_month = $julianDate[0];
        $gregorian_day   = $julianDate[1];
        $gregorian_year  = $julianDate[2];

        return $this->eu_monthNames[$gregorian_month - 1] ." ".$gregorian_day." ".$gregorian_year;
    }


    public function getETMonths()
    {
        return $this->et_monthNames;
    }

    public function getEUMonths()
    {
        return $this->eu_monthNames;
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