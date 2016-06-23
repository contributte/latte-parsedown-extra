# Latte-Parsedown-Extra

[ParsedownExtra](https://github.com/erusev/parsedown-extra) parser for Latte.

-----

[![Build Status](https://img.shields.io/travis/minetro/latte-parsedown-extra.svg?style=flat-square)](https://travis-ci.org/minetro/latte-parsedown-extra)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-parsedown-extra.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-parsedown-extra)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-parsedown-extra.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-parsedown-extra)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-parsedown-extra.svg?style=flat-square)](http://hhvm.h4cc.de/package/minetro/latte-parsedown-extra)

## Discussion / Help

[![Join the chat](https://img.shields.io/gitter/room/minetro/nette.svg?style=flat-square)](https://gitter.im/minetro/nette?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Install

```sh
$ composer require minetro/latte-parsedown-extra:~1.0.0
```

## Usage

### Register in config file 

```neon
extensions:
    parsedown: Minetro\ParsedownExtra\DI\ParsedownExtraExtension

parsedown:
    helper: parsedown # Name of the helper in Latte
```
