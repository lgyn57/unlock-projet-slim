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

$app->get('/load', \App\GameController::class . ':newGame');

$app->get('/game', \App\GameController::class . ':getCardsReturned');
// $app->get('/game', \App\UserController::class . ':game');

// $app->get('/cards/?cards={id}', \App\GameController::class . ':getOne');

// $app->get('/cards', \App\GameController::class . ':getCardsReturned');
$app->post('/game/return', \App\GameController::class . ':returnCard');

$app->post('/game/combine', \App\GameController::class . ':combineCard');

$app->post('/game/discard', \App\GameController::class . ':discardCard');

$app->post('/cards/save', \App\GameController::class . ':saveGame');

$app->get('/cards/all/', \App\GameController::class . ':getAll');




$app->run();