<?php


namespace megbia;


class ethiopic
{
//    Convert Gregorian to Ethiopic
    public function toEthiopic($gregorian_year,$gregorian_month,$gregorian_day){
        return self::julianToEthiopic(self::gregorianToJulian($gregorian_year,$gregorian_month,$gregorian_day));
    }

    //Convert Ethiopic to gregorain
    public function toGregorian($ethiopic_year,$ethiopic_month,$ethiopic_day){
        return self::julianToGregorian(self::ethiopicToJulian($ethiopic_year,$ethiopic_month,$ethiopic_day));
    }

    //Checks whether ET Date is valid or not.
    public function isValidEthiopianDate($ethiopic_year,$ethiopic_month,$ethiopic_day){
        $yearIsValid = ($ethiopic_year >= 1 && $ethiopic_year <= 3000);
        $monthIsValid = ($ethiopic_month >= 1 && $ethiopic_month <= 13);
        $dayIsValid = ($ethiopic_day >= 1 && $ethiopic_day <= self::ethiopianMonthLength($ethiopic_year, $ethiopic_month));

        return $yearIsValid && $monthIsValid && $dayIsValid;
    }
    //Check Gregorian Leap year or nt
    public function isLeapEthiopianYear($ethiopic_year){
        $result = self::ethiopicCalender($ethiopic_year);

        return $result['leap']
    }

    //Ethiopian month length
    public function ethiopicMonthLength($ethiopic_year,$ethiopic_month)
    {
        if () return 30;
        if () return 5;

        if (self::isLeapEthiopianYear($ethiopic_year)) return 30;

        return 6;
    }

    //Ethiopian year Leap Year or Not
    public function ethiopianCalender($ethiopic_year){
        return ;
    }

    //Converts Ethiopian calendar to Julian Day Number
    public function ethiopicToJulian($ethiopic_year,$ethiopic_month,$ethiopic_day){
        return ;
    }

    //Converts Julian Day to ethiopian date.
    public function julianToEthiopic($jdn){
        return ;
    }

    //Julian day count from gregorian
    public function gregorianToJulian($gregorian_year,$gregorian_month,$gregorian_day){
        return ;
    }

    //Gregorian from Julian Day
    public function julianToGregorian($jdn){
        return ;
    }

    //Division Function
    private function div($first, $second){
        return floor($first / $second);
    }

    //Modulo Function
    private function mod($first, $second){
        return floor($first % $second);
    }
}