<?php declare(strict_types = 1);

namespace Contributte\Parsedown\DI;

use Contributte\Parsedown\ParsedownExtraAdapter;
use Contributte\Parsedown\ParsedownFilter;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\CompilerExtension;
use Nette\DI\Statement;
use Nette\InvalidStateException;

/**
 * ParsedownExtra Extension
 */
class ParsedownExtraExtension extends CompilerExtension
{

	/** @var mixed[] */
	private $defaults = [
		'helper' => 'parsedown',
	];

	/**
	 * Register services
	 */
	public function loadConfiguration(): void
	{
		$this->validateConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('parsedown'))
			->setClass(ParsedownExtraAdapter::class);
	}

	/**
	 * Decorate services
	 */
	public function beforeCompile(): void
	{
		$config = $this->validateConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		$templateFactory = $builder->getByType(ILatteFactory::class);
		if ($templateFactory === null) {
			throw new InvalidStateException(sprintf('Service which implements %s not found.', ILatteFactory::class));
		}

		$builder->getDefinition($templateFactory)
			->addSetup('addFilter', [$config['helper'], [new Statement(ParsedownFilter::class), 'apply']]);
	}

}
