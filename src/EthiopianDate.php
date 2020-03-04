<?php


namespace Megbia;



class EthiopianDate
{

    protected $day, $d, $dd, $month, $m, $mm, $year;

    public function __construct($params)
    {
        $this->year = $params['year'];
        $this->d = $params['day']; //day of the month (number)
        $this->m = $params['month']; //month of the year (number)
        $this->dd = sprintf('%02d', $params['day']); //day of the month (01, 02, 11, 12,...)
        $this->mm = sprintf('%02d', $params['month']); //month of the year (number)
        $this->month = Constants::ET_MONTHS[$params['month']]; //month of the year (name)

        if(isset($params['day_of_the_week'])) {
            //day of the week (number, Monday=1)
            $this->day = Constants::ET_DAYS[$params['day_of_the_week']];
        }

    }

    public function format($format_string)
    {
        switch ($format_string) {
            case 'F': //A full textual representation of a month, such as January or March
                return $this->month;
                break;
            case 'm': //Numeric representation of a month, with leading zeros
                return $this->mm;
                break;
            case 'n': //Numeric representation of a month, without leading zeros
                return $this->m;
                break;
            case 'd': //Day of the month, 2 digits with leading zeros
                return $this->dd;
                break;
            case 'j': //Day of the month without leading zeros
                return $this->d;
                break;
            case 'Y': //A full numeric representation of a year, 4 digits
                return $this->year;
                break;
            case 'l': //A full textual representation of the day of the week
                return $this->day;
                break;
            case 'F j, Y':
                return $this->month . " " . $this->d . "፣ " . $this->year;
                break;
            case 'l, F j, Y':
                return $this->day . "፣ " . $this->month . " " . $this->d . "፣ " . $this->year;
                break;
            case 'd-m-Y':
                return $this->dd . "-" . $this->mm . "-" . $this->year;
                break;
            case 'd/m/Y':
                return $this->dd . "/" . $this->mm . "/" . $this->year;
                break;
            case 'F d':
                return $this->month . " " . $this->dd;
                break;
        }

    }

}