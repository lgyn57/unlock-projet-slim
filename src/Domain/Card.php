<?php

namespace App\Domain;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;


#[Entity, Table(name: 'card')]
final class Card
{
    #[Id, Column(type: 'string')]
    private string $id;


    #[Column(type: 'string', nullable: false)]
    private $color;

    #[Column(type: 'boolean', nullable: false, options: ['default' => false])]
    private $discarded;

    #[Column(type: 'boolean', nullable: false, options: ['default' => false])]
    private $returned;


    #[ManyToOne(targetEntity: Game::class, inversedBy: 'cards')]
    #[JoinColumn(name: 'game_id', referencedColumnName: 'id')]
    private Game $game;

    public function __construct(int $id,string $color, Game $game)
    {
        $this->id = $id;
        $this->color = $color;
        $this->game = $game;

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function getDiscarded(): bool
    {
        return $this->discarded;
    }

    public function getReturned(): bool
    {
        return $this->returned;
    }

    public function setDiscarded(bool $discarded): void
    {
        $this->discarded = $discarded;
    }

    public function setReturned(bool $returned): void
    {
        $this->returned = $returned;
    }


}
