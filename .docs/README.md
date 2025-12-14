# Parsedown/Markdown

## Content

- [Installation - how to install](#installation)
- [Configuration - how to configure](#configuration)
- [Usage - how to use](#usage)
- [Usage - standalone](#standalone-usage)

## Installation

```bash
composer require contributte/latte-parsedown-extra
```

## Configuration

```neon
extensions:
	parsedown: Contributte\Parsedown\DI\ParsedownExtraExtension

parsedown:
	# Default name is parsedown
	helper: parsedown # Name of the helper in Latte
```

## Usage

```latte
{block|parsedown}
# Headline

## Headline2

This is my text!

{/block}
```

## Standalone usage

Use the `ParsedownExtension` to register the filter directly with Latte (without Nette DI):

```php
use Contributte\Parsedown\ParsedownExtension;
use Latte\Engine;

$latte = new Engine();
$latte->addExtension(new ParsedownExtension());
```

You can customize the filter name:

```php
$latte->addExtension(new ParsedownExtension(filterName: 'markdown'));
```
