# Promolink News

Simple blog web-app with Laravel, Orchid, PostgreSQL

## Table of content:

- [General info](#general-info)
- [Setup](#setup)
- [Contacts](#contacts)

## General info

Simple blog web-app with Laravel, Orchid, PostgreSQL

## Setup

```console
$ cp .env.example .env (and configurate)
$ cp ./app/.env.example ./app/.env (and configurate)
$ docker-compose up -d --build
$ docker-compose exec laravel composer install
$ docker-compose exec laravel php artisan key:generate --ansi
$ docker-compose exec laravel php artisan migrate
$ docker-compose exec laravel php artisan db:seed
```

## Contacts

Created by [@stonedch](https://github.com/stonedch)
