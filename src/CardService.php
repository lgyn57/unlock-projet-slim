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

    public function returnCard($id){

        $card = $this->em->getRepository(Card::class)->find($id);
        $card->setReturned(true);
        $this->em->flush();

        return $card;
    }

    public function discard(string $numero): void
    {
        $card = $this->em->getRepository(Card::class)->findOneBy(['numero' => $numero]);
        // insert into database Game into table discardedCard

    
        
        $this->em->persist($card);
        $this->em->flush();

        
    }

    /*
    public function getFromBase(string $idCard): Card
    {
        $query = "SELECT c FROM Card c WHERE c.id LIKE $idCard";
        return $this->em->createQuery($query)->getResult();
    }

    public function search(string $idCard){
        if (getFromBase($idCard != null) {
            $card = getFromBase($idCard).id;
            echo "<img src=\"images/"+$card+".png\" alt=\"Dinosaur\" />"
        else {
            echo "carte non trouvée";
            }
        }
    } */

}