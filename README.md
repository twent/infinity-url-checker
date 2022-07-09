# Тестовое задание "Проверка URL с использованием очередей" (Url Checker with Queues)

# Ключевые особенности:
1) Использование очередей
2) Docker-compose + конфигурация Supervisor на заданное кол-во обработчиков очередей  
3) Observer + Event Listener
4) Guzzle Http Client
5) Migrations, Factory, Seeders

## Стек:

- Docker-compose
- PHP-8.1.8 FPM
- Laravel 9
- PostgreSQL 14
- Redis
- Пакеты (Laravel Breeze, Guzzle Http Client, TailwindCSS + DaisyUI, Laravel IDE Helper)

## Как развернуть

1) Клонировать данный репозиторий
2) Выбрать `.env.dev.example`или `.env.prod.example` за основу
3) `php artisan key:generate`
4) `composer install --optimize-autoloader`
5) `yarn install`
6) `yarn run prod`
7) `./vendor/bin/sail up` или `docker-compose up`
8) Внутри Докера выполнить `php artisan migrate --seed`
9) Открыть приложение в браузере `http://localhost`, если всё в порядке, то идём дальше.
10) `php artisan config:cache`
11) `php artisan route:cache`
12) `php artisan view:cache`
13) Учётная запись по умолчанию:
    Email: `test@example.com`
    Пароль: `12345678`

Автор: [twent](https://github.com/twent)
