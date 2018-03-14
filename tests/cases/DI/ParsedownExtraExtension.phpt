<?php


use Contributte\Parsedown\DI\ParsedownExtraExtension;
use Nette\Bridges\ApplicationDI\LatteExtension;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\Compiler;
use Nette\DI\Container;
use Nette\DI\ContainerLoader;
use Tester\Assert;
use Tester\FileMock;

require_once __DIR__ . '/../../bootstrap.php';

test(function () {
	$loader = new ContainerLoader(TEMP_DIR, TRUE);
	$class = $loader->load(function (Compiler $compiler) {
		$compiler->addExtension('console', new ParsedownExtraExtension());
		$compiler->addExtension('latte', new LatteExtension(TEMP_DIR));
		$compiler->loadConfig(FileMock::create('
		services:
			latte.latteFactory:
				setup:
					- setLoader(Latte\Loaders\StringLoader())
		', 'neon'));
	}, [microtime(), 1]);

	/** @var Container $container */
	$container = new $class;

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
