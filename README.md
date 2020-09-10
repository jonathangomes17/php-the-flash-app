# The Flash App
> Application responsible for generating the basics necessary to develop a Web application

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
    * [Events](#events)
    * [Contributors](#contributors)
<!--te-->

## Objective

- High performance
- Boilerplate with master class application
- MVC + DDD architecture focused on small applications, with very low cost

## Requirements

* Docker
* Node 13.*
* Composer

## Resources

- PHP
  
  - Fast Route (Controllers and Handlers)
  - JWT (Bigger Security of session user)
  - Event Dispatcher (Events and Subscribers)
  - Symfony/Console (Routines of cron)
  - Phinx (Commands of manipulation database)
  - Swift Mailer (Mail dispatcher)
  - Sentry (Monitoring errors)
  - DotEnv (Environments)
  - Illuminate/Database (ORM)
  - Twig Template (View layer)

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

Executing changes css and js 
```bash
npm run watch
```

Build assets
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

### Events
> Triggers that run in the background without affecting the user experience

- Enable the `fastcgi_finish_request` feature for a better api experience
- If not enabled, all events will be triggered at run time
- Example with three events `localhost:4000/api/v1/test/events`

## Contributors

1. [Jonathan Alves Gomes](https://github.com/jonathangomes17)
