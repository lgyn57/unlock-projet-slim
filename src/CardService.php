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

    public function signUp(string $info): Card
    {
        $newCard = new Card($info);

        $this->logger->info("Card {$info} signed up");

        $this->em->persist($newCard);
        $this->em->flush();

        return $newCard;
    }

    public function discard(string $numero): void
    {
        $card = $this->em->getRepository(Card::class)->findOneBy(['numero' => $numero]);

        if ($card === null) {
            throw new \Exception("Card {$numero} not found");
        }

        $this->logger->info("Card {$numero} discarded");

        $this->em->remove($card);
        $this->em->flush();
    }
}