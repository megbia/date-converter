<?php

namespace Megbia;

class DateConverter
{
    /**
     * Converts Gregorian data to Ethiopian calender date
     *
     * @param $date : any valid php date string: e.g. 2019-01-01 12:33:11
     * @return string: Ethiopian calender date
     *
     */
    public function toEthiopian($date)
    {
        $day_of_the_week = date('N', strtotime($date)); //1 (for Monday) through 7 (for Sunday)

        $d = date('d', strtotime($date));
        $m = date('m', strtotime($date));
        $y = date('Y', strtotime($date));

        $julianDate = gregoriantojd($m, $d, $y);
        $r = $this->mod(($julianDate - Constants::JULIAN_DATE_OFFSET), 1461);
        $n = $this->mod($r, 365) + (365 * ($this->div($r, 1460)));

        //int
        $year = 4 * $this->div(($julianDate - Constants::JULIAN_DATE_OFFSET), 1461) + $this->div($r, 365) - $this->div($r, 1460);
        //int
        $month = $this->div($n, 30) + 1;
        //int
        $day = $this->mod($n, 30) + 1;

        return new EthiopianDate([
            'day_of_the_week' => $day_of_the_week,
            'month' => $month,
            'year' => $year,
            'day' => $day,
        ]);
    }


    /**
     * Converts Ethiopian calendar date to Gregorian date
     *
     * @param $date: any valid php date string: e.g. 2012-01-01 12:33:11
     * @return string: Gregorian date
     *
     */
    public function toGregorian(EthiopianDate $date)
    {

        $day = $date->format('j');
        $month = $date->format('n');
        $year = $date->format('Y');

        $n = 30 * ($month - 1 ) + ($day - 1);

        $j = (Constants::JULIAN_DATE_OFFSET + 365) + 365 * ($year - 1) + $this->div($year, 4) + $n;

        $julianDayCount = jdtogregorian($j);

        $julianDate = explode('/', $julianDayCount);

        $month = $julianDate[0];
        $month = sprintf('%02d', $month);
        $day   = $julianDate[1];
        $day = sprintf('%02d', $day);
        $year  = $julianDate[2];

        return "$year-$month-$day";
    }

    /**
     * Division Function
     *
     * @param $first : number
     * @param $second : number
     * @return int
     */
    private function div($first, $second)
    {
        return ~~($first / $second);
    }


    /**
     * Modulo Function
     *
     * @param $first : number
     * @param $second : number
     * @return int
     */
    private function mod($first, $second)
    {
        return ($first % $second);
    }

}
