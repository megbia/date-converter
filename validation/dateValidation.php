<?php

namespace megbia\validation;

// use ethiopic.php;
// require_once '/src/ethiopic.php';

/**
 * 
 */
class dateValidation 
{
	
	// function __construct($ethiopic_year,$ethiopic_month,$ethiopic_day)
	// {
	// 	$this->ethiopic_day = $ethiopic_day;
 //        $this->ethiopic_month = $ethiopic_month;
 //        $this->ethiopic_year = $ethiopic_year;
	// }

    public function isValidEthiopianDate(){

        $yearIsValid = ($ethiopic_year >= 1 && $ethiopic_year <= 3000);
        $monthIsValid = ($ethiopic_month >= 1 && $ethiopic_month <= 13);
        $dayIsValid = ($ethiopic_day >= 1 && $ethiopic_day <= self::ethiopianMonthLength($ethiopic_year, $ethiopic_month));

        return $yearIsValid && $monthIsValid && $dayIsValid;
    }


}
