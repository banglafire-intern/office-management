# Office Management

## Setup

-   If you don't have mysql installed, You can run the database with docker
-   run

```sh
cd office-management
docker-compose up
```

## Database migrations

-   `php artisan make:migration create-policies --table=policies`
-   `php artisan make:migration create-leaves --table=leaves`
-   `php artisan make:migration create-attendances --table=attendances`
-   `php artisan make:migration create-reasons --table=reasons`

## Run migration

-   `php artisan migrate`

## Create Models

-   `php artisan make:model Policies`

## Create Seeders

-   `php artisan make:seeder PoliciesSeeder`

## Create Controllers

-   `php artisan make:controller PoliciesController`

## Database Query

-   **Why User & Remaining table are separate?**
    one user has many leaves & days. If we store remainings in the users table then there will be
    redundency in user data.
