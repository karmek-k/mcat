<?php

namespace KarmekK\Mcat\Config;

use KarmekK\Mcat\Database\Database;
use KarmekK\Mcat\Database\SqliteDatabase;
use KarmekK\Mcat\Database\TrackRepo;
use League\Container\Container;

$container = new Container();
$container->add(Database::class, SqliteDatabase::class);
$container->add(TrackRepo::class)->addArgument(Database::class);

return $container;
