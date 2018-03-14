<?php

namespace Contributte\Parsedown;

use Nette\SmartObject;
use ParsedownExtra;

/**
 * ParsedownExtra Adapter
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @method void onProcess(string $text, ParsedownExtraAdapter $adapter)
 */
class ParsedownExtraAdapter
{

	use SmartObject;

	/** @var ParsedownExtra */
	private $parsedown;

	/** @var array */
	public $onProcess = [];

	/**
	 * Creates adapter
	 *
	 * @param ParsedownExtra|NULL $parsedown
	 */
	public function __construct(ParsedownExtra $parsedown = NULL)
	{
		$this->parsedown = $parsedown ? $parsedown : new ParsedownExtra();
	}

	/**
	 * @param mixed $text
	 * @return mixed
	 */
	public function process($text)
	{
		$this->onProcess($text, $this);

		return $this->parsedown->parse($text);
	}

	/**
	 * @param mixed $line
	 * @return string
	 */
	public function processLine($line)
	{
		$this->onProcess($line, $this);

		return $this->parsedown->line($line);
	}

}
