<?php

namespace App\Domain;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\OneToMany;


#[Entity, Table(name: 'game')]
class Game
{

    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[OneToMany(targetEntity: Card::class, mappedBy: 'game')]

    private Collection $cards;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->cards[] = [];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(int $idCard): array
    {
        array_push($this->cards, $idCard);
        return $this->cards;
    }

    public function removeCard(int $idCard): array
    {
        $key = array_search($idCard, $this->cards);
        unset($this->cards[$key]);
        return $this->cards;
    }
}