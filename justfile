start:
    composer install --ignore-platform-reqs ; docker compose up --build -d; php artisan serve;

migrate:
    php artisan migrate

laravel:
    php artisan serve

stop:
    docker compose stop
