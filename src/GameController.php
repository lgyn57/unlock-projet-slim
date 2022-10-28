<?php
namespace App;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class GameController
{
  private $view;

  public function __construct(Twig $view, GameService $gameService)
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


    public function getOne(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];
        $card = $this->gameService->getCard($id);
        if($card == null){
          return $this->view->render($response, 'game.html.twig', [
            'id' => "card not found",
        ]);
        }
        //var_dump($card->getId());
        return $this->view->render($response, 'game.html.twig', [
            'id' => $card->getId(),
        ]);
        return $response;
    }

    public function getCardsReturned(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
      $listCards = $this->gameService->getAllReturnedCards();
      return $this->view->render($response, 'test3.html.twig', [
          'cards' => $listCards,
      ]);
      return $response;
    }
}