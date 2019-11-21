# Time Interval

This library was created to make parsing time entered into a task manager as easy as it is on popular apps like [Harvest](https://getharvest.com/) or [Tempo for JIRA](https://marketplace.atlassian.com/vendors/6558/tempo-for-jira).

## Requirements

- PHP 5.8 or higher
- Composer (if used as library)

## How to Use

```php
use MagicSpacePanda\TimeInterval;

// Handles durations as a float (1 hour and 45 minutes)
$floatTime = TimeInterval::createFromNumeric(1.75);
printf("Time spend on project is %s", $floatTime);

// Handles durations as an integer (3 hours)
$intTime = TimeInterval::createFromNumeric(1);
printf("Time spend on project is %s", $intTime);

// Handles durations as a string (5 hours and 25 minutes)
$strTime = TimeInterval::createFromString('5h 25m');
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
