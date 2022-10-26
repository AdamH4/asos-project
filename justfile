start:
    composer install --ignore-platform-reqs ; docker compose up --build -d; php artisan serve;

migrate:
    php artisan migrate

laravel:
    php artisan serve

database:
    php artisan migrate; php artisan scout:import

stop:
    docker compose stop

refesh-index:
    php artisan scout:flush; php artisan scout:import
