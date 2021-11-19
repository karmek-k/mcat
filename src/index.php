<?php

namespace KarmekK\Mcat;

require __DIR__ . '/../vendor/autoload.php';

require 'database/database.php'; // TODO: autoload

use KarmekK\Mcat\Database\Models\Track;
use KarmekK\Mcat\Database\TrackRepo;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

AppFactory::setContainer(require 'config/container.php');
$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);
$app->add(TwigMiddleware::create($app, require 'config/twig.php'));

$app->get('/tracks', function (Request $req, Response $res) {
    /** @var TrackRepo */
    $trackRepo = $this->get(TrackRepo::class);

    return Twig::fromRequest($req)->render($res, 'index.twig', [
        'tracks' => $trackRepo->findAll(),
    ]);
})->setName('track_list');

$app->get('/tracks/{id}', function (Request $req, Response $res, array $args) {
    /** @var TrackRepo */
    $trackRepo = $this->get(TrackRepo::class);

    return Twig::fromRequest($req)->render($res, 'track.twig', [
        'track' => $trackRepo->find($args['id']),
    ]);
})->setName('track_details');

$app->get('/seed', function (Request $req, Response $res) {
    /** @var TrackRepo */
    $trackRepo = $this->get(TrackRepo::class);
    $track = new Track();
    $track->title = 'with the lights out it\'s less dangerous';

    $trackRepo->insert($track);

    return $res->withHeader('Location', '/');
});

$app->run();
