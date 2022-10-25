<?php

namespace App;

use App\Domain\Card;
use Doctrine\ORM\EntityManager;
use App\Domain\User;
use Psr\Log\LoggerInterface;

final class CardService
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
        if ($card1->color == "bleu" && $card2->color =="rouge"|| $card1->couleur == "rouge" && $card2->couleur =="bleu")
        {
            $numeroAssemblage = $card1->numero +$card2->numero;
            return ($numeroAssemblage);
        }

    else if($card1->color =="gris" || $card1->color =="vert" || $card1->color =="jaune" 
            || $card2->color =="gris" || $card2->color =="vert" || $card2->color =="jaune")
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