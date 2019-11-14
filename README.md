# Date-converter
PHP date conversion library: Gregorian to Ethiopian and vise-versa.

Based on Dr. Berhanu Beyene and Dr. Manfred Kudlek JDN formulas (http://www.geez.org/Calendars/)

## Installation

```php
composer require megbia/date-converter
 ```
## Usage

```php
//ጥቅምት 18 2012
\Megbia\DateConverter::gregorianToEthiopian("2019-10-29 12:00:00");

//October 29 2019
\Megbia\DateConverter::ethiopianToGregorian("2012-2-18 12:00:00");
```
