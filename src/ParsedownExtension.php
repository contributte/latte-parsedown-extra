<?php declare(strict_types = 1);

namespace Contributte\Parsedown;

use Latte\Extension;

class ParsedownExtension extends Extension
{

	private ParsedownExtraAdapter $adapter;

	private string $filterName;

	public function __construct(?ParsedownExtraAdapter $adapter = null, string $filterName = 'parsedown')
	{
		$this->adapter = $adapter ?? new ParsedownExtraAdapter();
		$this->filterName = $filterName;
	}

	/**
	 * @return array<string, callable>
	 */
	public function getFilters(): array
	{
		$filter = new ParsedownFilter($this->adapter);

		return [
			$this->filterName => [$filter, 'apply'],
		];
	}

}
