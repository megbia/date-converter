# Date-convertor
PHP date conversion library: Gregorian to Ethiopian and vise-versa.
The base algorithm is based on Beyene-Kudlek Algorithm.

Base Ethiopic class has 3 methods defined inside megbia namespace, so no need for instantiation.

## Basic Usage

You can convert Gregorian to Ethiopian date from a given gregorian date

```php
//ጥቅምት 18 2012
\megbia\Ethiopic::gregorianToEthiopic(2019,10,29)
```

You can convert Ethiopian date to gregorian date from a given ethiopian date

```php
//October 29 2019
\megbia\Ethiopic::ethiopicToGregorian(2012,2,18)
```

### Methods :

gregorianToEthiopic($gregorian_year,$gregorian_month,$gregorian_day) : Converts a Gregorian date to ethiopian

ethiopicToGregorian($ethiopic_year,$ethiopic_month,$ethiopic_day): Converts a Ethiopian date to Gregorian

