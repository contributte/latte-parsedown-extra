<?php declare(strict_types = 1);

use Contributte\Parsedown\DI\ParsedownExtraExtension;
use Nette\Bridges\ApplicationDI\LatteExtension;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\Compiler;
use Nette\DI\Container;
use Nette\DI\ContainerLoader;
use Tester\Assert;
use Tester\FileMock;

require_once __DIR__ . '/../../bootstrap.php';

test(function (): void {
	$loader = new ContainerLoader(TEMP_DIR, true);
	$class = $loader->load(function (Compiler $compiler): void {
		$compiler->addExtension('latte', new LatteExtension(TEMP_DIR));
		$compiler->addExtension('parsedown', new ParsedownExtraExtension());
		$compiler->loadConfig(FileMock::create('
		services:
			latte.latteFactory:
				setup:
					- setLoader(Latte\Loaders\StringLoader())
		', 'neon'));
	}, [microtime(), 1]);

	/** @var Container $container */
	$container = new $class();

	$text = '
{block|parsedown}
# Headline

## Headline2
{/block}
';

	$latteFactory = $container->getByType(ILatteFactory::class);
	$latte = $latteFactory->create();

	Assert::equal("<h1>Headline</h1>\n<h2>Headline2</h2>", trim($latte->renderToString($text)));
});
