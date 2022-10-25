<?php
namespace App;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class CardController
{
  private $view;

  public function __construct(Twig $view, CardService $gameService)
  {
    $this->view = $view;
    $this->gameService = $gameService;
  }

//   public function test(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
//   {
//     $card = $this->cardService->signUp('test');
//     return $this->view->render($response, 'hello.twig', [
//       'name' => 'me',
//     ]);
//     return $response;
//   }


    public function returnedCard(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];
        $card = $this->gameService->returnCard($id);
        return $this->view->render($response, 'game.html.twig', [
            'id' => 'id',
        ]);
        return $response;
    }
}