<?php

namespace KarmekK\Mcat;

require __DIR__ . '/../vendor/autoload.php';

require 'database/database.php'; // TODO: autoload

use KarmekK\Mcat\Database\Database;
use KarmekK\Mcat\Database\TrackRepo;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

AppFactory::setContainer(require 'config/container.php');
$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/tracks', function (Request $req, Response $res) {
    /** @var TrackRepo */
    $trackRepo = $this->get(TrackRepo::class);
    $tracks = $trackRepo->findAll();

    $res->getBody()->write(json_encode($tracks));

    return $res;
});

$app->get('/tracks/{id}', function (Request $req, Response $res, array $args) {
    /** @var TrackRepo */
    $trackRepo = $this->get(TrackRepo::class);
    $track = $trackRepo->find($args['id']);

    $res->getBody()->write(json_encode($track));

    return $res; 
});

$app->get('/seed', function (Request $req, Response $res) {
    /** @var Database */
    $db = $this->get(Database::class);

    $db->getPdo()->exec('INSERT INTO tracks (title) VALUES ("bye")');

    return $res->withHeader('Location', '/');
});

$app->run();
