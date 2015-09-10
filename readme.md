# Latte-Parsedown-Extra

[![Build Status](https://travis-ci.org/minetro/latte-parsedown-extra.svg?branch=master)](https://travis-ci.org/minetro/latte-parsedown-extra)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-parsedown-extra.svg?style=flat)](https://packagist.org/packages/minetro/latte-parsedown-extra)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-parsedown-extra.svg?style=flat)](https://packagist.org/packages/minetro/latte-parsedown-extra)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-parsedown-extra.svg?style=flat)](http://hhvm.h4cc.de/package/minetro/latte-parsedown-extra)

[ParsedownExtra](https://github.com/erusev/parsedown-extra) parser for Latte.

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
