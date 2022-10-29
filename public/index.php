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


$app->get('/', \App\UserController::class . ':page');
$app->get('/game', \App\UserController::class . ':game');

$app->get('/cards/{id}', \App\GameController::class . ':getOne');

$app->get('/cards', \App\GameController::class . ':getCardsReturned');

$app->get('/cards/discard/{id}', \App\GameController::class . ':discardCard');
$app->get('/cards/returned/{id}', \App\GameController::class . ':returnCard');


$app->run();