<?php

namespace KarmekK\Mcat;

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $req, Response $res) {
    $res->getBody()->write('Hello world!');

    return $res;
});

$app->run();
