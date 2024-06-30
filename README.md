## Unilinkers - A Simple Property Management System

A simple PMS using Laravel and Javascript to perform CRUD operations for properties and rooms via API routes.

-   Laravel v11
-   PHP v8
-   Vue v3
-   Inertia

## Properties

-   GET: /api/properties -> _returns a list of all properties_
-   GET: /api/properties/{property} -> _returns a specific property_
-   POST: /api/properties -> _creates a new property_
-   PUT: /api/properties/{property} -> _updates an existing property_
-   DELETE: /api/properties/{property} -> _deletes a property_

## Rooms

-   GET: /api/rooms -> returns a list of all rooms
-   GET: /api/rooms/{property} -> returns all rooms that belong to a specific property

## Installation with Laravel Sail / Docker

Ensure docker is running then:

```
composer install
```

```
./vendor/bin/sail up
```

Migrate / Seed Database

```
./vendor/bin/sail shell
php artisan migrate
php artisan db:seed
```
