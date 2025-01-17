# Laravel Multiple Authentication
A simple implementation of multiple authentication in Laravel.

To follow along, this application has been documented as an article on Pusher blog. You can read about it [here](https://pusher.com/tutorials/multiple-authentication-guards-laravel)

## Set up

Change your working directory into the project directory
```bash
$ cd laravel-setup
```

Then install dependencies using [Composer](https://getcomposer.org/doc/00-intro.md)
```bash
$ composer install
```

Copy `.env.example` to `.env`
```bash
$ cp .env.example .env
```
## generate key
```bash
$ php artisan key:generate
```

## Run
Run the application with the following command
```bash
$ php artisan serve
```

## create model and controler and migrations commnd 
```bash
$ php artisan make:model Models/<name> -m -c -r
```

## Built With
[Laravel](https://laravel.com/) - The PHP Framework For Web Artisans.

[SQLite](https://en.wikipedia.org/wiki/SQLite) - A relational database management system.
