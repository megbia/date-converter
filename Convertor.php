<?php

class Converter
{

    /**
     * The Julian Day for a given Gregorian date.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     *
     * @return float
     */
    public static function gregorianToJulian(int $year, int $month, int $day)
    {
        if ($month < 3)
        {
            $year -= 1;
            $month += 12;
        }

        $a = floor($year / 100.0);
        $b = ($year === 1582 && ($month > 10 || ($month === 10 && $day > 4)) ? -10 :
            ($year === 1582 && $month === 10 ? 0 :
                ($year < 1583 ? 0 : 2 - $a + floor($a / 4.0))));

        return floor(365.25 * ($year + 4716)) + floor(30.6001 * ($month + 1)) + $day + $b - 1524;
    }

    /**
     * The Julian Day for a given Ethiopic date.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     *
     * @return float
     */
    public static function ethiopicToJulian(int $year, int $month, int $day)
    {
        //Algorthim
    }

    /**
     * The Gregorian date Day for a given Julian
     *
     * @param float $julianDay
     *
     * @return \stdClass
     */
    public static function julianToGregorian(float $julianDay)
    {
        $b = 0;
        if ($julianDay > 2299160)
        {
            $a = floor(($julianDay - 1867216.25) / 36524.25);
            $b = 1 + $a - floor($a / 4.0);
        }

        $bb = $julianDay + $b + 1524;
        $cc = floor(($bb - 122.1) / 365.25);
        $dd = floor(365.25 * $cc);
        $ee = floor(($bb - $dd) / 30.6001);

        $day = ($bb - $dd) - floor(30.6001 * $ee);
        $month = $ee - 1;

        if ($ee > 13)
        {
            $cc += 1;
            $month = $ee - 13;
        }

        $year = $cc - 4716;

        return (object) ['year' => (int) $year, 'month' => (int) $month, 'day' => (int) $day];
    }

    /**
     * The Ethiopic date Day for a given Julian
     *
     * @param float $julianDay
     *
     * @return \stdClass
     */
    public static function julianToEthiopic(float $julianDay)
    {
        $JULIAN_DATE_OFFSET = 1723856;
     

        $r = ($julianDate - $JULIAN_DATE_OFFSET) % 1461;
        $n = ($r % 365) + (365 * (floor(($r/1460))) );

        $year =  4 * floor(( ($jd - $jdOffset)/ 1461 ))  + floor( $r/ 365 ) -  floor(( $r/ 1460 ));
        $month = floor($n / 30) + 1;

        $day = ($n % 30) + 1;

        return (object) ['year' => (int) $year, 'month' => (int) $month, 'day' => (int) $day];
    }
}
