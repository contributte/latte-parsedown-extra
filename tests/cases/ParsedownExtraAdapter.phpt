<?php declare(strict_types = 1);

use Contributte\Parsedown\ParsedownExtraAdapter;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test(function (): void {
	$adapter = new ParsedownExtraAdapter();

	$text = '
# Headline

## Headline2

* 1
';

	Assert::equal("<h1>Headline</h1>\n<h2>Headline2</h2>\n<ul>\n<li>1</li>\n</ul>", $adapter->process($text));
});
