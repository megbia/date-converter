<?php

namespace megbia\tests;

use ethiopic.php;
// require_once '/src/ethiopic.php';

class ethiopicTest extends \PHPUnit_Framework_TestCase
{
	//Test if given is valid Ethiopian Date
    public testIsValidEthiopianDate(){

    }

    public testToEthiopian(){

    	$this->assertEquals(array(
    		'ethiopic_year' => 1991,
    	 	'ethiopic_month' => 4, 
    	 	'ethiopic_day' => 23), \megbia\Ethiopic::gregorianToEthiopic(1999, 1, 1));
    }

    public testToGregorian(){

    	$this->assertEquals(array(
    		'gregorain_year' => 1999, 
    		'gregorain_month' => 1, 
    		'gregorain_day' => 1), \megbia\Ethiopic::ethiopicToGregorian(1991, 4, 23));
    }
}
