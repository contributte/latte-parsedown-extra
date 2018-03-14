<?php

namespace Contributte\Parsedown;

use Latte\Runtime\FilterInfo;
use Latte\Runtime\Html;

class ParsedownFilter
{

	/** @var ParsedownExtraAdapter */
	protected $adapter;

	/**
	 * @param ParsedownExtraAdapter $adapter
	 */
	public function __construct(ParsedownExtraAdapter $adapter)
	{
		$this->adapter = $adapter;
	}

	/**
	 * @param FilterInfo $info
	 * @param mixed $text
	 * @return Html
	 */
	public function apply(FilterInfo $info, $text)
	{
		return new Html($this->adapter->process($text));
	}

}
