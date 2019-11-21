# Time Duration

[![Latest Stable Version](https://img.shields.io/packagist/v/magicspacepanda/time-duration.svg?style=flat-square)](https://packagist.org/packages/magicspacepanda/time-duration)
[![Build Status](https://travis-ci.com/leemcd56/time-duration.svg?branch=master)](https://travis-ci.com/leemcd56/time-duration)

This library was created to make parsing time entered into a task manager as easy as it is on popular apps like [Harvest](https://getharvest.com/) or [Tempo for JIRA](https://marketplace.atlassian.com/vendors/6558/tempo-for-jira).

## Requirements

- PHP 7.2 or higher
- Composer (if used as library)

## Install

### With Composer

`composer require magicspacepanda/time-duration`

## How to Use

```php
use MagicSpacePanda\TimeDuration;

// Handles durations as a float (1 hour and 45 minutes)
$floatTime = TimeDuration::createFromNumeric(1.75);
printf("Time spend on project is %s", $floatTime);

// Handles durations as an integer (3 hours)
$intTime = TimeDuration::createFromNumeric(1);
printf("Time spend on project is %s", $intTime);

// Handles durations as a string (5 hours and 25 minutes)
$strTime = TimeDuration::createFromString('5h 25m');
printf("Time spend on project is %s", $strTime);

// Convert output to DateTime instance
$floatTime->toDateTime();

// Convert output to custom format
$intTime->toFormat('H:i');

// Convert output to machine-friendly milliseconds
$strTime->toMilliseconds();
```

## Contributing

If you would like to contribute to this library, please create a pull request for me to review. Should your code be accepted I will add your name below.
