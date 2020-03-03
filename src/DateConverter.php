<?php

namespace Megbia;

class DateConverter
{
    protected $julian_date_offset = 1723856;

    protected $et_months = [
        1 => 'መስከረም',
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

    protected $eu_months = [
        1 => 'January',
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

    protected $et_days = [
        1 => 'ሰኞ',
        'ማክሰኞ',
        'ረቡዕ',
        'ሓሙስ',
        'ዓርብ',
        'ቅዳሜ',
        'እሑድ'
    ];


    /**
     * Converts Gregorian data to Ethiopian calender date
     *
     * @param $date : any valid php date string: e.g. 2019-01-01 12:33:11
     * @return string: Ethiopian calender date
     *
     */
    public function gregorianToEthiopian($date)
    {
        $day_of_the_week = date('N', strtotime($date)); //1 (for Monday) through 7 (for Sunday)

        $d = date('d', strtotime($date));
        $m = date('m', strtotime($date));
        $y = date('Y', strtotime($date));

        $julianDate = gregoriantojd($m, $d, $y);
        $r = $this->mod(($julianDate - $this->julian_date_offset), 1461);
        $n = $this->mod($r, 365) + (365 * ($this->div($r, 1460)));

        //int
        $year = 4 * $this->div(($julianDate - $this->julian_date_offset), 1461) + $this->div($r, 365) - $this->div($r, 1460);
        //int
        $month = $this->div($n, 30) + 1;
        //int
        $day = $this->mod($n, 30) + 1;

        return new EthiopianDate([
            'day' => $this->et_days[$day_of_the_week],
            'month' => $this->et_months[$month],
            'year' => $year,
            'd' => $day,
            'm' => $month,
        ]);
    }


    public function getETMonths()
    {
        return $this->et_months;
    }

    public function getEUMonths()
    {
        return $this->eu_months;
    }

    public function getETDays()
    {
        return $this->et_days;
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
