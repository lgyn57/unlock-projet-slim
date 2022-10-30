<?php
namespace App;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class UserController
{
  private $view;

  public function __construct(Twig $view, UserService $userService)
  {
    $this->view = $view;
    $this->userService = $userService;
  }

  public function test(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
  {
    $user = $this->userService->signUp('root');
    return $this->view->render($response, 'hello.html.twig', [
      'name' => 'me',
    ]);
    return $response;
  }

  public function page(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
  {
    return $this->view->render($response, 'menu.html.twig');
    return $response;
  }

  public function game(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
  {
    return $this->view->render($response, 'game.html.twig');
    return $response;
  }
}