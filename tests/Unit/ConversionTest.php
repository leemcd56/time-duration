<?php

namespace Tests\Unit;

use MagicSpacePanda\TimeInterval;
use Tests\BaseTest;

class ConversionTest extends BaseTest
{
    public function testCustomFormat()
    {
        $result = TimeInterval::createFromString('1h');
        $this->assertEquals('01:00', $result->toFormat('H:i'));
    }

    public function testDateTime()
    {
        $result = TimeInterval::createFromString('1h');
        $this->assertInstanceOf('DateTime', $result->toDateTime());
    }

    public function testMilliseconds()
    {
        $duration = (1 * 60 * 60) * 1000;

        $result = TimeInterval::createFromString('1h');
        $this->assertEquals($duration, $result->toMilliseconds());
    }
}