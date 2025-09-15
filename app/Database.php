<?php

require_once 'config/config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => DRIVER,
    'host' => HOST,
    'database' => DATABASE,
    'username' => USERNAME,
    'password' => PASSWORD,
    'charset' => CHARSET,
    'collation' => COLLATION,
    'prefix' => PREFIX,
]);

// Set the event dispatcher used by Eloquent models... (optional)
// use Illuminate\Events\Dispatcher;
// use Illuminate\Container\Container;
// $capsule->setEventDispatcher(new Dispatcher(new Container()));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
