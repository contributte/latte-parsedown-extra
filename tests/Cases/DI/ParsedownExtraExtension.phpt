<?php declare(strict_types = 1);

use Contributte\Parsedown\DI\ParsedownExtraExtension;
use Contributte\Tester\Environment;
use Contributte\Tester\Toolkit;
use Contributte\Tester\Utils\ContainerBuilder;
use Contributte\Tester\Utils\Neonkit;
use Nette\Bridges\ApplicationDI\LatteExtension;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\Compiler;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

Toolkit::test(function (): void {
	$container = ContainerBuilder::of()
		->withCompiler(function (Compiler $compiler): void {
			$compiler->addExtension('latte', new LatteExtension(Environment::getTestDir()));
			$compiler->addExtension('parsedown', new ParsedownExtraExtension());
			$compiler->addConfig(Neonkit::load(<<<'NEON'
			services:
				latte.latteFactory:
					setup:
						- setLoader(Latte\Loaders\StringLoader())
			NEON
			));
		})->build();

	$text = <<<'LATTE'
{block|parsedown}
# Headline

## Headline2
{/block}
LATTE;

	$latteFactory = $container->getByType(ILatteFactory::class);
	$latte = $latteFactory->create();

	Assert::equal("<h1>Headline</h1>\n<h2>Headline2</h2>", trim($latte->renderToString($text)));
});
