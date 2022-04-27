<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## <p align="center">BCM TEST APPLICATION </p>

----------

# Getting started

## Installation

Clone the repository

    git clone git@github.com:nyagoalex/BCM-test.git

Switch to the repo folder

    cd BCM-test

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:nyagoalex/BCM-test.git
    cd BCM-test
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**No seeders are required for this application**

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

## API Specification

User API

    GET /api/users
    GET /api/users/{user_id}
    POST /api/users
    PACTH /api/users/{user_id}
    DELETE /api/users/{user_id}

User API

    GET /api/users/{user_id}/contacts
    GET /api/users/{user_id}/contacts/{contact_id}
    POST /api/users/{user_id}/contacts
    PACTH /api/users/{user_id}/contacts/{contact_id}
    DELETE /api/users/{user_id}/contacts/{contact_id}

----------
## Testing APIs
Application follows test driven design run the following command to test the api

    composer test

Thank you for considering my work
