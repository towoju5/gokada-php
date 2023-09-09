# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/towoju5/gokada-php.svg?style=flat-square)](https://packagist.org/packages/towoju5/gokada-php)
[![Total Downloads](https://img.shields.io/packagist/dt/towoju5/gokada-php.svg?style=flat-square)](https://packagist.org/packages/towoju5/gokada-php)
![GitHub Actions](https://github.com/towoju5/gokada-php/actions/workflows/main.yml/badge.svg)

The Gokada PHP package is a versatile and developer-friendly toolkit for integrating Gokada's services and features into PHP applications. It streamlines the process of accessing Gokada's ride-sharing and delivery services, allowing developers to create innovative solutions that leverage Gokada's capabilities within their PHP projects.

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
