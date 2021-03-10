# Parsedown/Markdown

## Content

- [Installation - how to install](#installation)
- [Extension - how to configure](#configuration)
- [Usage - how to use](#usage)

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
