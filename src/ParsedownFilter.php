<?php declare(strict_types = 1);

namespace Contributte\Parsedown;

use Exception;
use Latte\ContentType;
use Latte\Runtime\FilterInfo;

class ParsedownFilter
{

	protected ParsedownExtraAdapter $adapter;

	public function __construct(ParsedownExtraAdapter $adapter)
	{
		$this->adapter = $adapter;
	}

	public function apply(FilterInfo $info, mixed $text): mixed
	{
		if ($info->contentType !== ContentType::Html) {
			throw new Exception('Filter |parsedown used in incompatible content type.');
		}

		return $this->adapter->process($text);
	}

}
