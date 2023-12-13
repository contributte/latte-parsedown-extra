<?php declare(strict_types = 1);

namespace Contributte\Parsedown\DI;

use Contributte\Parsedown\ParsedownExtraAdapter;
use Contributte\Parsedown\ParsedownFilter;
use LogicException;
use Nette\Bridges\ApplicationLatte\LatteFactory;
use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\FactoryDefinition;
use Nette\DI\Definitions\Statement;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use stdClass;

/**
 * @method stdClass getConfig()
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
		$config = $this->getConfig();

		if ($builder->getByType(LatteFactory::class) === null) {
			throw new LogicException('You should register LatteFactory first');
		}

		$latte = $builder->getDefinitionByType(LatteFactory::class);
		assert($latte instanceof FactoryDefinition);
		$latte
			->getResultDefinition()
			->addSetup('addFilter', [$config->helper, [new Statement(ParsedownFilter::class), 'apply']]);
	}

}
