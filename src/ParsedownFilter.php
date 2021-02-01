<?php declare(strict_types = 1);

namespace Contributte\Parsedown;

use Exception;
use Latte\Engine;
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
	 * @param FilterInfo $info
	 * @param mixed $text
	 */
	public function apply(FilterInfo $info, $text): string
	{
		if ($info->contentType !== Engine::CONTENT_HTML) {
			throw new Exception('Filter |parsedown used in incompatible content type.');
		}

		return $this->adapter->process($text);
	}

}
