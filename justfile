start:
    composer install --ignore-platform-reqs
    docker compose up --build -d
    php artisan serve

migrate:
    php artisan migrate

laravel:
    php artisan serve

database:
    php artisan migrate
    php artisan scout:import

create-data:
    php artisan migrate
    php artisan db:seed

stop:
    docker compose stop

refesh-index:
    php artisan scout:flush
    php artisan scout:import

prepare-data: create-data
    @php artisan scout:import
    @php artisan key:generate
