# Date-converter
PHP date conversion library: Gregorian to Ethiopian.

Based on Dr. Berhanu Beyene and Dr. Manfred Kudlek JDN formulas (http://www.geez.org/Calendars/)

## Installation

```php
composer require megbia/date-converter
 ```
## Usage

```php
use \Megbia\DateConverter;
$dc = new DateConverter();
$dc->gregorianToEthiopian("2019-10-29 12:00:00")->format('F j, Y'); //ጥቅምት 18፣ 2012

