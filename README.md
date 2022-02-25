## Second Step Test at Technopartner

Installation:

-   Make Sure your machine can run laravel application.
-   Clone repo to your work directory.
-       composer install
-       npm install
-       cp .env.example .env
-   Change the environmet variable inside .env file.
-       php artisan key:generate
-       php artisan migrate
-       php artisan db:seed
-   Highly recomended to use virtual host in your local development, example : technopartner.test

## Development Tested

    PHP v7.3.25
    Framework : Laravel v8.83.2
    Database Engine : MySQL
