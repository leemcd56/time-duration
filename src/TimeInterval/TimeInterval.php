<?php

namespace MagicSpacePanda;

use MagicSpacePanda\Traits\CreatesTime;
use DateTime;

class TimeInterval
{
    use CreatesTime;

    /**
     * Formatted timestamp.
     *
     * @var string
     */
    protected $formatted;

    public function __construct($formatted)
    {
        $this->formatted = $formatted;
    }

    /**
     * Return duration as string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->formatted ?? '00:00:00';
    }

    /**
     * Convert duration to instance of DateTime.
     *
     * @return DateTime
     */
    public function toDateTime()
    {
        return DateTime::createFromFormat('H:i:s', $this->formatted);
    }

    /**
     * Allow time interval to be reformatted.
     *
     * @param string $format
     * @return string
     */
    public function toFormat($format = 'U')
    {
        $date_time = $this->toDateTime();
        return $date_time->format($format);
    }

    /**
     * Convert formatted time to machine-friendly milliseconds.
     *
     * @return int
     */
    public function toMilliseconds()
    {
        $timestamp = explode(':', $this->formatted);

        $hours = intval($timestamp[0]) * 3600;
        $minutes = intval($timestamp[1]) * 60;
        $seconds = intval($timestamp[2]);

        $milliseconds = ($hours + $minutes + $seconds) * 1000;

        return $milliseconds;
    }
}