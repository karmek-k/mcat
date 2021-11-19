<?php

namespace KarmekK\Mcat\Config;

use Slim\Views\Twig;

$twig = Twig::create('templates', ['cache' => false]);

return $twig;
