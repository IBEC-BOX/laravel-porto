# This package implements the Porto, a modern Software Architectural Pattern

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibecsystems/laravel-porto.svg?style=flat-square)](https://packagist.org/packages/ibecsystems/laravel-porto)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibec-box/laravel-porto/run-tests.yml?branch=2.x&label=tests&style=flat-square)](https://github.com/ibec-box/laravel-porto/actions?query=workflow:run-tests+branch:2.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibec-box/laravel-porto/fix-php-code-style-issues.yml?branch=2.x&label=code%20style&style=flat-square)](https://github.com/ibec-box/laravel-porto/actions?query=workflow:"Fix+PHP+code+style+issues"+branch:2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/ibecsystems/laravel-porto.svg?style=flat-square)](https://packagist.org/packages/ibecsystems/laravel-porto)

## Roadmap
- [ ] Ship folder generator
- [x] Подумать над авторегистрацией MainServiceProvider (импорт в ShipProvider)
- [ ] Убрать RouteServiceProvider
- [ ] Внедрить Filament v3
- [ ] Обновить документацию по Porto (как работает пакет)

## Installation

You can install the package via composer:

```bash
composer require ibecsystems/laravel-porto
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="porto-config"
```

## Usage

Standard Container's Structure:
```
Container
	├── Actions
	├── Tasks
	├── Models
	├── Providers
	│   ├── MainServiceProvider.php
	│   ├── RouteServiceProvider.php
	└── UI
	    ├── WEB
	    │   ├── Routes
	    │   ├── Controllers
	    │   └── Views
	    ├── API
	    │   ├── Routes
	    │   ├── Controllers
	    │   └── DTO
	    └── CLI
	        ├── Routes
	        └── Commands
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
