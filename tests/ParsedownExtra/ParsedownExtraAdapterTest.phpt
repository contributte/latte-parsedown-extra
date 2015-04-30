<?php

/**
 * Test: ParsedownExtraAdapter
 */

use Minetro\Parsedown\ParsedownExtraAdapter;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test(function() {
    $adapter = new ParsedownExtraAdapter();

    $text = "
# Headline
## Headline2
    ";

    Assert::equal("<h1>Headline</h1>\n<h2>Headline2</h2>", $adapter->process($text));
});