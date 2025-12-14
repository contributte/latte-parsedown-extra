<?php declare(strict_types = 1);

use Contributte\Parsedown\ParsedownExtension;
use Contributte\Tester\Toolkit;
use Latte\Engine;
use Latte\Loaders\StringLoader;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

Toolkit::test(function (): void {
	$latte = new Engine();
	$latte->addExtension(new ParsedownExtension());
	$latte->setLoader(new StringLoader());

	$text = <<<'LATTE'
{block|parsedown}
# Headline

## Headline2
{/block}
LATTE;

	Assert::equal("<h1>Headline</h1>\n<h2>Headline2</h2>", trim($latte->renderToString($text)));
});

Toolkit::test(function (): void {
	$latte = new Engine();
	$latte->addExtension(new ParsedownExtension(filterName: 'markdown'));
	$latte->setLoader(new StringLoader());

	$text = <<<'LATTE'
{block|markdown}
# Custom Filter Name
{/block}
LATTE;

	Assert::equal('<h1>Custom Filter Name</h1>', trim($latte->renderToString($text)));
});
