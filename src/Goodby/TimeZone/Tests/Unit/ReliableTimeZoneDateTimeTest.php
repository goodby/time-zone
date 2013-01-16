<?php

namespace Goodby\TimeZone\Tests\Unit;

use Goodby\TimeZone\ReliableTimeZoneDateTime;

class ReliableTimeZoneDateTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testUsage()
    {
        // Server: Asia/Tokyo
        // User: Asia/Shanghai

        if (true) {
            define('ZEN_METRICS_CLIENT_TIMEZONE', 'Asia/Shanghai');
        } else {
            define('ZEN_METRICS_CLIENT_TIMEZONE', 'UTC');
        }

        // model
        $createdTime = (new ReliableTimeZoneDateTime())->setTimestamp(999994149);
        $this->assertEquals('2001-09-09T02:09:09+02:00', $createdTime->formatWithTimezone(DATE_ATOM, date_default_timezone_get()));


        // view
        $this->assertEquals('2001-09-09T02:09:09+02:00', $createdTime->formatWithTimezone(DATE_ATOM, date_default_timezone_get()));
        $this->assertEquals('2001-09-09T08:09:09+08:00', $createdTime->formatWithTimezone(DATE_ATOM, ZEN_METRICS_CLIENT_TIMEZONE));
    }
}
