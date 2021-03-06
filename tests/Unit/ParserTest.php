<?php

namespace Tests\Unit;

use MagicSpacePanda\TimeDuration;
use Tests\BaseTest;

class ParserTest extends BaseTest
{
    public function testFromDateTime()
    {
        $result = TimeDuration::createFromDateTime('7:15');
        $this->assertEquals('07:15:00', $result);
    }

    public function testFromFloat()
    {
        $result = TimeDuration::createFromNumeric(4.75);
        $this->assertEquals('04:45:00', $result);
    }

    public function testFromInteger()
    {
        $result = TimeDuration::createFromNumeric(3);
        $this->assertEquals('03:00:00', $result);
    }

    public function testFromString()
    {
        $result = TimeDuration::createFromString('1h 45m');
        $this->assertEquals('01:45:00', $result);
    }
}