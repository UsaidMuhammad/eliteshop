## About Project

A simple e-commerce project made with laravel (PHP)

## Setup

Note to self: set up db migrations.

You need composer, vagrant, homestead, refer to the official docs if you have now idea what im talking about.

open a cmd window in the folder and run `composer install`.

Setup your .env, use redis for cache and session for better preformance.

run `vendor\\bin\\homestead make` inside the folder if you're on windows or `php vendor/bin/homestead make` if your on UNIX

Simply `vagrant up` and import the database from the backup included inside the .mysqlbackup folder.

For the admin panel visit `eliteshop.test/admin`.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
