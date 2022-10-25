<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

$container = require_once __DIR__ . '/../bootstrap.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->add(TwigMiddleware::createFromContainer($app));


$app->get('/', function (Request $request, Response $response, $args) {
    return $this->view->render($response, 'hello.html.twig', [
      ]);
});

$app->get('/users', \App\UserController::class . ':test');

$app->run();