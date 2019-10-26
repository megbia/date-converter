<?php


namespace megbia;


class ethiopic
{
//    Convert Gregorian to Ethiopic
    public function toEthiopic($gregorian_year,$gregorian_month,$gregorian_day){
        return self::d2j(self::g2d($gregorian_year,$gregorian_month,$gregorian_day));
    }

    //Convert Ethiopic to gregorain
    public function toGregorian($ethiopic_year,$ethiopic_month,$ethiopic_day){
        return self::d2g(self::j2d($ethiopic_year,$ethiopic_month,$ethiopic_day));
    }

    //Checks whether ET Date is valid or not.
    public function isValidEthiopianDate($ethiopic_year,$ethiopic_month,$ethiopic_day){
        $yearIsValid = ($ethiopic_year >= 1 && $ethiopic_year <= 3177);
        $monthIsValid = ($ethiopic_month >= 1 && $ethiopic_month <= 13);
        $dayIsValid = ($ethiopic_day >= 1 && $ethiopic_day <= self::ethiopianMonthLength($ethiopic_year, $ethiopic_month));

        return $yearIsValid && $monthIsValid && $dayIsValid;
    }
    //Check Leap year or nt
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
}