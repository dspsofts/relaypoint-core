<?php

/**
 * Describes the opening hours of a relay point.
 *
 * @author Pierre Feyssaguet <pfeyssaguet@gmail.com>
 * @since 2015-01-11
 */

namespace RelayPoint\Core;

class OpeningHours
{
	/**
	 * Day
	 *
	 * @var string
	 */
	private $day;

	/**
	 * Hours
	 *
	 * @var string
	 */
	private $hours;

	/**
	 * Constructor.
	 *
	 * @param string $day Day
	 * @param string $hours Hours
	 */
	public function __construct($day, $hours)
	{
		$this->day = $day;
		$this->hours = $hours;

		// Maybe the hours have no interruption, in that case we "shrink" them
		$matches = array();
		$pattern = '/';
		$pattern .= '(?<morning1>\d+:\d+) \- (?<morning2>\d+:\d+)';
		$pattern .= ' ';
		$pattern .= '(?<evening1>\d+:\d+) \- (?<evening2>\d+:\d+)';
		$pattern .= '/';
		if (preg_match($pattern, $this->hours, $matches)) {
			if ($matches['morning2'] == $matches['evening1']) {
				$this->hours = $matches['morning1'] . ' - ' . $matches['evening2'];
			}
		}
	}

	public function getDay()
	{
		return $this->day;
	}

	public function getHours()
	{
		return $this->hours;
	}
}
