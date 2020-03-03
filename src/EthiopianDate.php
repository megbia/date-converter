<?php


namespace Megbia;



class EthiopianDate
{

    protected $day, $d, $dd, $month, $m, $mm, $year;

    public function __construct($params)
    {
        $this->day = $params['day']; //day of the week (name)
        $this->month = $params['month']; //month of the year (name)
        $this->year = $params['year'];
        $this->d = $params['d']; //day of the month (number)
        $this->dd = sprintf('%02d', $params['d']); //day of the month (01, 02, 11, 12,...)
        $this->m = $params['m']; //month of the year (number)
        $this->mm = sprintf('%02d', $params['m']); //month of the year (number)
    }

    public function format($format_string)
    {
        switch ($format_string) {
            case 'F': //A full textual representation of a month, such as January or March
                return $this->month;
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