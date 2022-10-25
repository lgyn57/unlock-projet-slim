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
    $user = $this->userService->signUp('test');
    return $this->view->render($response, 'hello.twig', [
      'name' => 'me',
    ]);
    return $response;
  }


  //fonction defausse automatique
  //defausse une carte si dans la description de la carte il est dit que l'on peut defausser cette carte


  //fonction defausse manuelle
  //defausse la carte selectionné par le jouer
}


