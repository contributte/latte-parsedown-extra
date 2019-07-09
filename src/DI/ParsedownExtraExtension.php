<?php declare(strict_types = 1);

namespace Contributte\Parsedown\DI;

use Contributte\Parsedown\ParsedownExtraAdapter;
use Contributte\Parsedown\ParsedownFilter;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\FactoryDefinition;
use Nette\DI\Statement;
use Nette\InvalidStateException;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

/**
 * ParsedownExtra Extension
 */
class ParsedownExtraExtension extends CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'helper' => Expect::string('parsedown'),
		]);
	}

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('parsedown'))
			->setFactory(ParsedownExtraAdapter::class);
	}

	public function beforeCompile(): void
	{
		$builder = $this->getContainerBuilder();

		if ($builder->getByType(ILatteFactory::class) === null) {
			throw new InvalidStateException(sprintf('Service which implements %s not found.', ILatteFactory::class));
		}

		$config = (array) $this->config;
		$latte = $builder->getDefinitionByType(ILatteFactory::class);
		assert($latte instanceof FactoryDefinition);
		$latte->getResultDefinition()->addSetup('addFilter', [$config['helper'], [new Statement(ParsedownFilter::class), 'apply']]);
	}

}
