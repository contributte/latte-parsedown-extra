<?php declare(strict_types = 1);

use Contributte\Parsedown\ParsedownExtraAdapter;
use Contributte\Parsedown\ParsedownFilter;
use Contributte\Tester\Toolkit;
use Latte\Engine;
use Latte\Loaders\StringLoader;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

Toolkit::test(function (): void {
	$adapter = new ParsedownExtraAdapter();
	$latte = new Engine();
	$latte->addFilter('parsedown', [new ParsedownFilter($adapter), 'apply']);
	$latte->setLoader(new StringLoader());

	$text = <<<'LATTE'
{block|parsedown}
# Headline

## Headline2
{/block}
LATTE;

	Assert::equal("<h1>Headline</h1>\n<h2>Headline2</h2>", trim($latte->renderToString($text)));
});
