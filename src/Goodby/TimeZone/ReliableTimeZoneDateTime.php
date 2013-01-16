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
	
	public function formatWithTimezone($format, $timezone)
	{
		return (new DateTime)
			->setTimestamp($this->getTimestamp())
			->setTimezone(new DateTimeZone($timezone))
			->format($format);
	}
}
