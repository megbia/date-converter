# date-convertor
PHP date conversion library: Gregorian to Ethiopian and vise-versa.
The base algorithm is based on Beyene-Kudlk Algoritihm

Base Ethiopic class has 3 methods defined inside megbia namespace, so no need for instantiation.To convert Gregorian date to Ethiopian Date please use this code 

```php
\Ethiopic\Ethiopic::gregorianToEthiopic(1999, 1, 1)
```
Methods :

gregorianToEthiopic($gregorian_year,$gregorian_month,$gregorian_day) : Converts a Gregorian date to ethiopian

ethiopicToGregorian($ethiopic_year,$ethiopic_month,$ethiopic_day): Converts a Ethiopian date to Gregorian

