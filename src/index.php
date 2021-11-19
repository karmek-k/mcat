<?php

namespace KarmekK\Mcat;

require __DIR__ . '/../vendor/autoload.php';

require 'database/database.php'; // TODO: autoload

use KarmekK\Mcat\Database\Database;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

AppFactory::setContainer(require 'config/container.php');
$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $req, Response $res) {
    /** @var Database */
    $db = $this->get(Database::class);

    foreach ($db->getPdo()->query('SELECT * FROM tracks') as $track) {
        var_dump($track);
    }

    $res->getBody()->write('Hello world!');

    return $res;
});

$app->get('/seed', function (Request $req, Response $res) {
    /** @var Database */
    $db = $this->get(Database::class);

    $db->getPdo()->exec('INSERT INTO tracks (title) VALUES ("hi")');

    return $res->withHeader('Location', '/');
});

$app->run();
