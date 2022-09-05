## Laravel Ekatte (Current: Laravel 8.*)

Laravel Ekatte is a multilingual admin panel based on the Laravel 8.

## Setup

Clone the repo and follow below steps.
1. Run `composer install`
2. Copy `.env.example` to `.env`
3. Set valid database credentials of env variables `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
4. Run `php artisan key:generate` to generate application key
5. Run `php artisan migrate`
7. Run `php artisan db:seed` to seed your database
8. Run `npm i` (Recommended node version `>= V13.14.0`)
9. Run `npm run dev` or `npm run prod` as per your environment

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ScreenShots

## List Settlements

![Screenshot](screenshots/settlements.png)

## List Town halls

![Screenshot](screenshots/town-halls.png)

## List Municipalities

![Screenshot](screenshots/municipalities.png)

## List Districts

![Screenshot](screenshots/districts.png)

## List Regions

![Screenshot](screenshots/regions.png)

## List Users

![Screenshot](screenshots/users.png)

## List Deleted Users

![Screenshot](screenshots/deleted-users.png)

## List Roles

![Screenshot](screenshots/roles.png)

## List Permissions

![Screenshot](screenshots/permissions.png)
