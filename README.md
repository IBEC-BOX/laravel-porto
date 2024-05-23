# This package implements the Porto, a modern Software Architectural Pattern

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibecsystems/laravel-porto.svg?style=flat-square)](https://packagist.org/packages/ibecsystems/laravel-porto)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibec-box/laravel-porto/run-tests.yml?branch=3.x&label=tests&style=flat-square)](https://github.com/ibec-box/laravel-porto/actions?query=workflow:run-tests+branch:3.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibec-box/laravel-porto/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/ibec-box/laravel-porto/actions?query=workflow:"Fix+PHP+code+style+issues"+branch:3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/ibecsystems/laravel-porto.svg?style=flat-square)](https://packagist.org/packages/ibecsystems/laravel-porto)

## Requirements

- Laravel 11
- Filament 3
- Spatie/Laravel-Data v4

## Roadmap

- [x] Add Ship folder generator command
- [x] Auto import MainServiceProvider to ShipProvider
- [x] Remove RouteServiceProvider
- [x] Support Filament v3, add FilamentPlugin to generator
- [x] Update Porto installing documentation

## Installation

You can install the package via composer:

```bash
composer require ibecsystems/laravel-porto
```

And run this command to copy **Ship** folder and import ShipProvider

```bash
php artisan porto:install
```

You can try running this command to check the successful installation **Porto**:

```bash
php artisan porto:check
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="porto-config"
```

## Usage

You can generate new container via command:

```bash
php artisan make:porto-container
```

You can see other generate commands:

```bash
php artisan make:porto
```

Standard Container's Structure:

```
Container
	├── Database
	├── Models
	├── Providers
	│   └── MainServiceProvider.php
	└── UI
	    ├── WEB
	    │   ├── Routes
	    │   ├── Controllers
	    │   └── Views
	    ├── API
	    │   ├── Routes
	    │   ├── Controllers
	    │   ├── Actions
	    │   ├── DTO
	    │   ├── RequestDTO
	    │   └── Routes
	    └── CLI
	        ├── Routes
	        └── Commands
```

Filament v2 Structure:

```
Container
	├── Providers
	│   └── FilamentServiceProvider.php
	└── UI
	    └── Filament
	        └── Resources
	            └── FilamentResource.php
```

Filament v3 Structure:

```
Container
	└── UI
	    └── Filament
	        ├── Resources
	        │   └── FilamentResource.php
	        └── FilamentPlugin.php
            
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
