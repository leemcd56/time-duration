<?php

namespace MagicSpacePanda\Traits;

trait CreatesTime
{
    /**
     * Convert float to human-readable duration.
     *
     * @param float $timestamp
     * @return string
     */
    private static function convertFromFloat($timestamp)
    {
        $hours = intval($timestamp);
        $minutes = fmod($timestamp, 1) * 60;
        return sprintf('%02s:%02s:00', $hours, $minutes);
    }

    /**
     * Convert integer to human-readable duration.
     *
     * @param int $timestamp
     * @return string
     */
    private static function convertFromInteger($timestamp)
    {
        $hours = intval($timestamp);
        return sprintf('%02s:00:00', $hours);
    }

    public function __construct($timestamp)
    {
        parent::__construct($timestamp);
    }

    /**
     * Convert a date/time string to human-readable duration.
     *
     * @return self
     */
    public static function createFromDateTime($timestamp)
    {
        $date_time = date_parse($timestamp);

        if (!$date_time) {
            throw new Error('Expected timestamp to be valid date/time.');
        }

        $hours = $date_time['hour'];
        $minutes = $date_time['minute'];
        $seconds = $date_time['second'];

        $duration = sprintf('%02s:%02s:%02s', $hours, $minutes, $seconds);
        return static::instance($duration);
    }

    /**
     * Convert numeric interval to human-readable duration.
     *
     * @return self
     */
    public static function createFromNumeric($timestamp)
    {
        if (!is_numeric($timestamp)) {
            throw new Error('Expected timestamp to be either type float or int.');
        }

        if (fmod($timestamp, 1) < 1) {
            $duration = self::convertFromFloat($timestamp);
        } else {
            $duration = self::convertFromInteger($timestamp);
        }
        
        return static::instance($duration);
    }

    /**
     * Convert string timestamp to human-readable duration.
     *
     * @param string $timestamp (optional)
     * @return self
     */
    public static function createFromString($timestamp)
    {
        $regex = '/^(?:(?<hours>\d+)h\s*)?(?:(?<minutes>\d+)m\s*)?(?:(?<seconds>\d+)s\s*)?$/';

        if (preg_match($regex, $timestamp, $matches)) {
            $hours = !empty($matches['hours']) ? $matches['hours'] : '00';
            $minutes = !empty($matches['minutes']) ? $matches['minutes'] : '00';
            $seconds = !empty($matches['seconds']) ? $matches['seconds'] : '00';

            $duration = sprintf('%02s:%02s:%02s', $hours, $minutes, $seconds);
            return static::instance($duration);
        }

        return static::instance('00:00:00');
    }

    public static function instance($timestamp)
    {
        try {
            return new static($timestamp);
        } catch (Exception $e) {
            throw $e;
        }
    }
}