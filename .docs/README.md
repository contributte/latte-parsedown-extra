# Parsedown/Markdown

## Content

- [Usage - how to register](#usage)
- [Extension - how to configure](#configuration)

## Usage

```sh
composer require contributte/latte-parsedown-extra
```

## Configuration

```yaml
extensions:
    parsedown: Contributte\Parsedown\DI\ParsedownExtraExtension

parsedown:
    helper: parsedown # Name of the helper in Latte
```
