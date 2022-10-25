## Spustenie :rocket:

Ako prvy krok je potrebne prekopirovat ENV do spravneho suboru

```bash
$ cp .env.example .env
```

```bash
$ php artisan seed:db
```

```bash
$ php artisan scout:import
```

Idealne si naistalovat [tento](https://github.com/casey/just) command line runner nech je vsetko jednoduchsie.

A potom uz len v roote projektu spustit tento prikaz :bomb:. Samozrejme je potrebne mat Docker nainstalovany a zaroven aj spusteny

```bash
$ just
```


Ak nechceme nic zbytocne doinstalovat tak potom :monkey_face:

```bash
$ composer install --ignore-platform-reqs ; docker compose up --build -d; php artisan migrate; php artisan serve
```


## Upratovanie :zap:

```bash
$ just clean
```

Alebo po starom :church:

```bash
$ docker compose stop
```
