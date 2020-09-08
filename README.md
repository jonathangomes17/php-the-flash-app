# The Flash App
> Aplicação (Quase que um framework :)) responsável por gerar o básico necessário para desenvolver uma aplicação Web

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

## Contributors

1. [Jonathan Alves Gomes](https://github.com/jonathangomes17)
