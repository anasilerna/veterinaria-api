# API de veterinaria

API REST hecha con Laravel 12 para gestionar animales y sus dueños.

Incluye dos recursos:

- `/api/animales`
- `/api/duenos`

Los dos permiten listar, crear, consultar, actualizar y eliminar registros. Al crear un dueño se comprueba que el animal indicado exista.

## Tecnologías

- PHP 8.2
- Laravel 12
- Eloquent ORM
- SQLite

## Puesta en marcha

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

La API queda disponible en `http://127.0.0.1:8000/api`.

## Ejemplo

Crear un animal:

```bash
curl -X POST http://127.0.0.1:8000/api/animales \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"nombre":"Luna","tipo":"gato","peso":4.2}'
```

Los tipos admitidos son `perro`, `gato`, `hamster` y `conejo`.
