# The Flash App
> Aplicação responsável por gerar o básico necessário para desenvolver uma aplicação Web

[![Maintainability](https://api.codeclimate.com/v1/badges/ab4f2041a09a3434a3a2/maintainability)](https://codeclimate.com/github/jonathangomes17/php-the-flash-app/maintainability)
<a href="https://codeclimate.com/github/jonathangomes17/php-the-flash-app/test_coverage"><img src="https://api.codeclimate.com/v1/badges/ab4f2041a09a3434a3a2/test_coverage" /></a>

__Table of Contents__
=====================

<img align="right" srcset="https://i.imgur.com/qJmbQPo.jpeg, https://i.imgur.com/qJmbQPo.jpeg 1.5x, https://i.imgur.com/qJmbQPo.jpeg 2x" src="https://i.imgur.com/qJmbQPo.jpeg" width="150px;" />

<!--ts-->
* [TheFlashApp](#the-flash-app)
    * [Table of contents](#table-of-contents)
    * [Objective](#objective)
    * [Requirements](#requirements)
    * [Resources](#resources)
    * [Setup](#setup)
        * [Docker](#docker)
        * [Front-End](#front-end)
    * [Phinx](#phinx)
        * [Migration](#migration)
        * [Seed](#seed)
    * [Contributors](#contributors)
<!--te-->

## Objective

- Ter alta performance
- Boilerplate com master class
- Arquitetura MVC + DDD focado em aplicações pequenas, com custo bem baixo

## Requirements

* Docker
* Node 13.*
* Composer


## Resources

- PHP
  
  - Fast Route (Controllers e API)
  - JWT (Segurança na sessão do usuário)
  - Event Dispatcher (Trabalhando com Events e Subscribers)
  - Symfony/Console (Rotinas do cron)
  - Phinx (Comandos no BD)
  - Swift Mailer (Disparando e-mails)
  - Sentry (Monitoração de erros)
  - DotEnv (Variáveis de ambiente)
  - Illuminate/Database (ORM)
  - Twig Template (Camada view)

- TypeScript
- Webpack
- SASS
- Docker

  - MySQL
  - MySQL Adminer
  - Apache
  - PHP 7.2

## Setup

### Docker
```bash
sh .bin/exec.sh
```

### Front-End

Executando alterações CSS + JS 
```bash
npm run watch
```

Build dos assets
```bash
npm run build
```

## Phinx

### Migration

Create a new migration
```bash
docker exec theflashapp_php vendor/bin/phinx create TestMigration
```

Runing all migrations
```bash
docker exec theflashapp_php vendor/bin/phinx migrate -e production
```

### Seed

Create a new seeder
```bash
docker exec theflashapp_php vendor/bin/phinx seed:create TestSeed
```

Runing all seeders
```bash
docker exec theflashapp_php vendor/bin/phinx seed:run -e production
```

Runing initial application
```bash
docker exec theflashapp_php vendor/bin/phinx seed:run -s User -s Role -s UserRole -s Action -s RoleAction -e production 
```

## Contributors

1. [Jonathan Alves Gomes](https://github.com/jonathangomes17)
