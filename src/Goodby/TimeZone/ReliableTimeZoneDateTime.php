<?php
 
namespace Goodby\TimeZone;
 
use Exception;
use DateTime;
use DateTimeZone;
 
class ReliableTimeZoneDateTime extends DateTime
{
	public function format($format)
	{
		throw new Exception('You can\'t call format(). Please call by formatWithTimezone()');
	}

    /**
     * @param $format
     * @param string $timezone optional if not passed this argument will use default timezone
     * @return string
     */
    public function formatWithTimezone($format, $timezone = null)
	{
        if ($timezone === null) {
            $timezone = date_default_timezone_get();
        }

		return (new DateTime)
			->setTimestamp($this->getTimestamp())
			->setTimezone(new DateTimeZone($timezone))
			->format($format);
	}
}
