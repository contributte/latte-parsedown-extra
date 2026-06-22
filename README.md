![](https://heatbadger.now.sh/github/readme/contributte/latte-parsedown-extra/)

<p align=center>
    <a href="https://github.com/contributte/latte-parsedown-extra/actions"><img src="https://badgen.net/github/checks/contributte/latte-parsedown-extra"></a>
    <a href="https://coveralls.io/r/contributte/latte-parsedown-extra"><img src="https://badgen.net/coveralls/c/github/contributte/latte-parsedown-extra"></a>
    <a href="https://packagist.org/packages/contributte/latte-parsedown-extra"><img src="https://badgen.net/packagist/dm/contributte/latte-parsedown-extra"></a>
    <a href="https://packagist.org/packages/contributte/latte-parsedown-extra"><img src="https://badgen.net/packagist/v/contributte/latte-parsedown-extra"></a>
</p>
<p align=center>
    <a href="https://packagist.org/packages/contributte/latte-parsedown-extra"><img src="https://badgen.net/packagist/php/contributte/latte-parsedown-extra"></a>
    <a href="https://github.com/contributte/latte-parsedown-extra"><img src="https://badgen.net/github/license/contributte/latte-parsedown-extra"></a>
    <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
    <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
    <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
    Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

Markdown filter for Latte powered by Parsedown Extra, with Nette DI integration and standalone Latte extension support.

## Versions

| State       | Version  | Branch   | PHP     |
|-------------|----------|----------|---------|
| dev         | `^3.1`   | `master` | `>=8.2` |
| stable      | `^3.0`   | `master` | `>=8.2` |

## Installation

To install latest version of `contributte/latte-parsedown-extra` use [Composer](https://getcomposer.org).

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

## Standalone Usage

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

## Development

See [how to contribute](https://contributte.org) to this package. This package is currently maintained by these authors.

<a href="https://github.com/f3l1x">
    <img width="80" height="80" src="https://avatars.githubusercontent.com/f3l1x">
</a>

-----

Consider to [support](https://contributte.org/partners) **contributte** development team.
Also thank you for using this package.
