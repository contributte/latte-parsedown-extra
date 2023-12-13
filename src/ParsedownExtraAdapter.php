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

	/** @var callable[] */
	public array $onProcess = [];

	private ParsedownExtra $parsedown;

	/**
	 * Creates adapter
	 */
	public function __construct(?ParsedownExtra $parsedown = null)
	{
		$this->parsedown = $parsedown ?? new ParsedownExtra();
	}

	public function process(mixed $text): mixed
	{
		$this->onProcess($text, $this);

		return $this->parsedown->parse($text);
	}

	public function processLine(mixed $line): string
	{
		$this->onProcess($line, $this);

		return $this->parsedown->line($line);
	}

}
