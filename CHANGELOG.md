# Changelog

All notable changes to `Porto` will be documented in this file.

## v2.1.0 - 2023-08-18

- refactor: remove unused old generator
- feat: add ContainerGenerator command
- feat: add --resource option in ControllerGenerator command
- feat: add --requests parameter in ControllerGenerator
- feat: add FilamentResourceGenerator command
- feat: add MigrationGenerator command
- feat: add FactoryGenerator command
- feat: add ApiRequestGenerator command
- feat: add ProviderGenerator command
- feat: add ApiResourceGenerator command
- feat: add ApiRoutesGenerator command
- feat: add ControllerApiGenerator command
- feat: add ModelGenerator command

## v2.0.6 - 2023-06-22

- fix: loadViews with prefix "container@{containerName}::{view.name}"

## v2.0.5 - 2023-05-17

- fix run-tests.yml
- fix phpstan errors

## v2.0.4 - 2023-05-17

- require laravel 10

## v2.0.3 - 2023-05-17

- rename stub files, add prepend Abstract to name
- fix registerMiddlewareGroups function

## v2.0.2 - 2023-05-14

fix autoload service providers

## v2.0.1 - 2023-05-12

fix deploy branch name

## v1.0.6 - 2023-05-01

- add /Database folder beside with /Data

## v1.0.4 - 2023-03-24

- fix load localizations in register() method, instead boot()

## v1.0.3 - 2023-03-20

- add PathsLoader trait
- update CHANGELOG.md

## v1.0.2 - 2023-03-19

- create PathLoader trait
- format code by pint
- add universal load path method

## v1.0.1 - 2023-03-09

- load ShipProvider if exists

## v1.0.0 - 2023-03-08

- add loaders
- add abstracts
- autoload all Containers
