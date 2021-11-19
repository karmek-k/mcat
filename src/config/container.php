<?php

namespace KarmekK\Mcat\Config;

use KarmekK\Mcat\Database\Database;
use KarmekK\Mcat\Database\SqliteDatabase;
use League\Container\Container;

$container = new Container();
$container->add(Database::class, SqliteDatabase::class);

return $container;
