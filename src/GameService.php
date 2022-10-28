<?php

namespace App;

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

    public function createCard($id,$couleur,$game){

        $newCard = new Card($id,$couleur,$game);

        $this->logger->info("Card {$id} signed up");

        $this->em->persist($newCard);
        $this->em->flush();

        return $newCard;
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