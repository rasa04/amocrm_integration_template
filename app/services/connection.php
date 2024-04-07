<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;

// Settings up database
$capsule = new Manager();

$capsule->addConnection([
    'driver' => env('DB_DRIVER'),
    'database' => env('MYSQL_DATABASE'),
    'username' => env('MYSQL_USER'),
    'password' => env('MYSQL_PASSWORD'),
    'host' => env('MYSQL_HOST'),
    'port' => env('MYSQL_PORT'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
