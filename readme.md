## About Project

A simple e-commerce project made with laravel (PHP)

## Setup

You need composer, vagrant, homestead, refer to the official docs if you have now idea what im talking about.

open a cmd window in the folder and run `composer install`.

Setup your .env, use redis for cache and session for better preformance.

Simply `vagrant up` and import the database from the backup included inside the .mysqlbackup.

For the admin panel visit `eliteshop.test/admin`.

Note to self: set up db migrations.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
