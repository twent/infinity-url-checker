# Тестовое задание "Проверка URL с использованием очередей" (Url Checker with Queues)

![infinity-url-checker-results_cr](https://user-images.githubusercontent.com/7511983/178134731-92aec1a0-e9e7-4dfd-8159-94f4e16ad385.jpg)

# Ключевые особенности:
1) Использование очередей
2) Docker-compose + конфигурация Supervisor на заданное кол-во обработчиков очередей  
3) Observer + Event Listener
4) Guzzle Http Client
5) Migrations, Factory, Seeders

## Стек:

- Docker-compose
- PHP-8.1.8 FPM
- Laravel 9!

- PostgreSQL 14
- Redis
- Пакеты (Laravel Breeze, Guzzle Http Client, TailwindCSS + DaisyUI, Laravel IDE Helper)

## Как развернуть

1) Клонировать данный репозиторий
2) Выбрать `.env.dev.example`или `.env.prod.example` за основу
3) `composer install --optimize-autoloader`
4) `php artisan key:generate`
5) `yarn install`
6) `yarn run build`
7) `./vendor/bin/sail build --no-cache`
8) `./vendor/bin/sail up` или `docker-compose up`
9) Внутри Докера выполнить `php artisan migrate --seed`
10) Открыть приложение в браузере `http://localhost`, если всё в порядке, то идём дальше.
11) `php artisan config:cache`
12) `php artisan route:cache`
13) `php artisan view:cache`
14) Учётная запись по умолчанию:
    Email: `test@example.com`
    Пароль: `12345678`

Автор: [twent](https://github.com/twent)
