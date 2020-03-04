<?php


namespace Megbia;


class Constants
{

    const JULIAN_DATE_OFFSET = 1723856;

    const ET_MONTHS = [
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

    const ET_DAYS = [
        1 => 'ሰኞ',
        'ማክሰኞ',
        'ረቡዕ',
        'ሓሙስ',
        'ዓርብ',
        'ቅዳሜ',
        'እሑድ'
    ];

    public function getETMonths()
    {
        return self::ET_MONTHS;
    }

    public function getETDays()
    {
        return self::ET_DAYS;
    }

}