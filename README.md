# Тестовое задание

Интернет магазин

## Репозиторий

https://github.com/Archetarcher/test-shop
## Использует

- [Laravel] v.9.19.
- PHP v.8.1
- [Docker] - CI/CD.
- [Composer] - Пакетный менеджер для php.
- [Sanctum] - Sanctum authentication.
- [Vue] - v 3.0
- [Vuex] - v 4.1.0




## Установка

Из директории проекта:

```
docker-compose  up  --build
```

Необходимо сконфигурировать файл `.env` по примеру `.env.example`



Установка всех пакетов:

```sh
docker-compose  exec laravel.test composer install

docker-compose  exec laravel.test npm install && npm run dev
```

Генерация ключа приложения:

```sh
docker-compose  exec laravel.test php artisan key:generate
```

Накатить миграции:

```sh
docker-compose  exec laravel.test php artisan migrate:seed --fresh
```

[Docker]: <https://docs.docker.com/>

[Laravel]: <https://laravel.com/docs/8.x>

[Composer]: <https://getcomposer.org/>

[Sanctum]: <https://laravel.com/docs/9.x/sanctum/>

[Vue]: <https://vuejs.org//>

[Vuex]: <https://vuex.vuejs.org/>
