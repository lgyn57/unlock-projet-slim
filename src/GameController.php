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

    public function discardCard(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
      $id = $args['id'];
      $this->gameService->discard($id);
      return $response->withHeader('Location', '../../cards')->withStatus(302);
    }

    public function returnCard(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
      $id = $args['id'];
      $this->gameService->returnCard($id);
      return $response->withHeader('Location', '../../cards')->withStatus(302);
    }

    public function combineCard(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
      $id_one = $args['id_one'];
      $id_two = $args['id_two'];
      $this->gameService->assemblyVerification($id_one, $id_two);
      return $response->withHeader('Location', '../../cards')->withStatus(302);
    }

    public function saveGame(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
      $this->gameService->saveGame();
      return $response->withHeader('Location', '../../cards')->withStatus(302);
    }

}