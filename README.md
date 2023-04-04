# This package implements the Porto, a modern Software Architectural Pattern

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibecsystems/laravel-porto.svg?style=flat-square)](https://packagist.org/packages/ibecsystems/laravel-porto)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibecsystems/laravel-porto/run-tests.yml?branch=1.x&label=tests&style=flat-square)](https://github.com/ibecsystems/laravel-porto/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibecsystems/laravel-porto/fix-php-code-style-issues.yml?branch=1.x&label=code%20style&style=flat-square)](https://github.com/ibecsystems/laravel-porto/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ibecsystems/laravel-porto.svg?style=flat-square)](https://packagist.org/packages/ibecsystems/laravel-porto)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require ibecsystems/laravel-porto
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="porto-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="porto-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="porto-views"
```

## Usage

```php
$porto = new AdminKit\Porto();
echo $porto->echoPhrase('Hello, AdminKit!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Anastas Mironov](https://github.com/ast21)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
