<?php

namespace App;

use App\Domain\Game;
use App\Domain\Card;
use Doctrine\ORM\EntityManager;
use App\Domain\User;
use Psr\Log\LoggerInterface;

final class GameService
{
    private EntityManager $em;

    public function __construct(EntityManager $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
    }

   /* public function signUp(string $info): Card
    {
        $newCard = new Card($info);

        $this->logger->info("Card {$info} signed up");

        $this->em->persist($newCard);
        $this->em->flush();

        return $newCard;
    }*/

    public function createCard($id,$couleur,$game,$discarded,$returned){

        $newCard = new Card($id,$couleur,$game,$discarded,$returned);

        $this->logger->info("Card {$id} signed up");

        $this->em->persist($newCard);
        $this->em->flush();

        return $newCard;
    }

    public function createGame()
    {
        $game = new Game();
        $this->em->persist($game);
        $this->em->flush();
        // transforme $game to a string
        

        $gameId = serialize($game);
        var_dump($gameId[55].$gameId[56]);
        $test =  intval($gameId[55].$gameId[56].$gameId[57].$gameId[58].$gameId[59].$gameId[60].$gameId[61].$gameId[62].$gameId[63]);
        var_dump($test);

        $i = 55;
        $valueGameId = $test;
        if($valueGameId > 99)
        {
            
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2]);
        }
        else if ($valueGameId > 999)
        {
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2].$gameId[$i+3]);
        }
        else if ($valueGameId > 9999)
        {
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2].$gameId[$i+3].$gameId[$i+4]);
        }
        else if ($valueGameId > 99999)
        {
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2].$gameId[$i+3].$gameId[$i+4].$gameId[$i+5]);
        }
        else if ($valueGameId > 999999)
        {
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2].$gameId[$i+3].$gameId[$i+4].$gameId[$i+5].$gameId[$i+6]);
        }
        else if ($valueGameId > 9999999)
        {
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2].$gameId[$i+3].$gameId[$i+4].$gameId[$i+5].$gameId[$i+6].$gameId[$i+7]);
        }
        else if ($valueGameId > 99999999)
        {
            $valueGameId = intval($gameId[$i].$gameId[$i+1].$gameId[$i+2].$gameId[$i+3].$gameId[$i+4].$gameId[$i+5].$gameId[$i+6].$gameId[$i+7].$gameId[$i+8]);
        }
        
        $this->createCard(5,"grey",$valueGameId,false,true);
        $this->createCard(8,"blue",$valueGameId,false,false);
        $this->createCard(11,"grey",$valueGameId,false,false);
        $this->createCard(15,"blue",$valueGameId,false,false);
        $this->createCard(22,"red",$valueGameId,false,false);
        $this->createCard(30,"grey",$valueGameId,false,false);
        $this->createCard(37,"blue",$valueGameId,false,false);
        $this->createCard(42,"blue",$valueGameId,false,false);
        $this->createCard(43,"grey",$valueGameId,false,false);
        $this->createCard(44,"red",$valueGameId,false,false);
        $this->createCard(52,"grey",$valueGameId,false,false);
        $this->createCard(58,"red",$valueGameId,false,false);
        $this->createCard(66,"grey",$valueGameId,false,false);
        $this->createCard(73,"grey",$valueGameId,false,false);
        $this->createCard(86,"grey",$valueGameId,false,false);
        $this->createCard(88,"grey",$valueGameId,false,false);
        $this->createCard(92,"grey",$valueGameId,false,false);
        $this->createCard("C","grey",$valueGameId,false,false);
        $this->createCard("F121","grey",$valueGameId,false,false);
        $this->createCard("G171","yellow",$valueGameId,false,false);
        $this->createCard("H161","grey",$valueGameId,false,false);
        $this->createCard("R131","yellow",$valueGameId,false,false);
        $this->createCard("V151","grey",$valueGameId,false,false);
        $this->createCard("W141","green",$valueGameId,false,false);
       // return $game;
        

    }

    public function getAllCards(){
        $cards = $this->em->getRepository(Card::class)->findAll();
        return $cards;
    }

    public function getAllReturnedCards(){
        $cards = $this->em->getRepository(Card::class)->findBy(['returned' => true]);
        return $cards;
    }

    public function getAllDiscardedCards(){
        $cards = $this->em->getRepository(Card::class)->findBy(['discarded' => true]);
        return $cards;
    }

    public function returnCard($id){

        $card = $this->em->getRepository(Card::class)->find($id); 
        $card->setReturned(true);
        $this->em->persist($card);
        $this->em->flush();

        return $card;
    }

    public function discard(string $numero): void
    {
        $card = $this->em->getRepository(Card::class)->findOneBy(['numero' => $numero]);
        $card->setDiscarded(true);
        
        $this->em->persist($card);
        $this->em->flush();

        
    }
    public function assemble(Card $card1,Card $card2)
    {
        if ($card1->color == "blue" && $card2->color =="red"|| $card1->couleur == "red" && $card2->couleur =="blue")
        {
            $numeroAssemblage = $card1->numero +$card2->numero;
            return ($numeroAssemblage);
        }

    else if($card1->color =="grey" || $card1->color =="green" || $card1->color =="yellow" 
            || $card2->color =="grey" || $card2->color =="green" || $card2->color =="yellow")
        {
            return(0);
        }

    
    }

    public function assemblyVerification($numero1,$numero2)
    {
    
        $card1 = $this->em->getRepository(Card::class)->find($numero1);
        $card2 = $this->em->getRepository(Card::class)->find($numero2);

        if($card1 != null && $card2 != null)
        {
            $assemblyNumber = $this->assemble($card1,$card2);

        }else if($card1 == null && $card2 != null)
        {
            $assemblyNumber = $numero1 + $card2->numero;

        } else if($card1 != null && $card2 == null)
        {
            $assemblyNumber = $card1->numero + $numero2;
        }

        if($assemblyNumber != 0)
            {
                $this->returnCard($assemblyNumber);
            }else{
                echo "Assemblage impossible";
            }
    }
    

    public function getCard($id){
        $card = $this->em->getRepository(Card::class)->find($id);
        return $card;
    }

    public function saveGame($game)
    {
        $this->em->persist($game);
        $this->em->flush();
    }

   
}