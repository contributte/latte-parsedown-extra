<?php declare(strict_types = 1);

namespace Contributte\Parsedown;

use Nette\SmartObject;
use ParsedownExtra;

/**
 * ParsedownExtra Adapter
 *
 * @method void onProcess(string $text, ParsedownExtraAdapter $adapter)
 */
class ParsedownExtraAdapter
{

	use SmartObject;

	/** @var ParsedownExtra */
	private $parsedown;

	/** @var callable[] */
	public $onProcess = [];

	/**
	 * Creates adapter
	 */
	public function __construct(?ParsedownExtra $parsedown = null)
	{
		$this->parsedown = $parsedown ?: new ParsedownExtra();
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
	 */
	public function processLine($line): string
	{
		$this->onProcess($line, $this);

		return $this->parsedown->line($line);
	}

}
