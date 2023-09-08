# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/towoju5/gokada-php.svg?style=flat-square)](https://packagist.org/packages/towoju5/gokada-php)
[![Total Downloads](https://img.shields.io/packagist/dt/towoju5/gokada-php.svg?style=flat-square)](https://packagist.org/packages/towoju5/gokada-php)
![GitHub Actions](https://github.com/towoju5/gokada-php/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require towoju5/gokada-php
```

## Live mode

```php
$gokada = new GoKada($apiKey);
```

## Sandbox mode

```php
$gokada = new GoKada($apiKey, true);
```

## Usage

```php
$resul = $gokada->orderStatus("HSSRD-745143");
$resul = $gokada->orderCancel("HSSRD-745143");
$resul = $gokada->orderHistory("HSSRD-745143");
$resul = $gokada->createOrder($createOrder);
$resul = $gokada->estimate($createOrder);
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com) by [Beyond Code](http://beyondco.de/).
