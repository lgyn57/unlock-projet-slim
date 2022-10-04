<?php
namespace App;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Psr7\Response;

class UserController{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function test(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $user = $this->userService->signUp('test');
        $payload = json_encode($user);

        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
}