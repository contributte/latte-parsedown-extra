<?php declare(strict_types = 1);

namespace Contributte\Parsedown;

use Latte\Runtime\FilterInfo;

class ParsedownFilter
{

	/** @var ParsedownExtraAdapter */
	protected $adapter;

	public function __construct(ParsedownExtraAdapter $adapter)
	{
		$this->adapter = $adapter;
	}

	/**
	 * @param mixed $text
	 */
	public function apply(FilterInfo $info, $text): string
	{
		return $this->adapter->process($text);
	}

}
