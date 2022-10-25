<?php

namespace App\Domain;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name: 'Cards')]
final class Card
{
    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[Column(type: 'string', unique: true, nullable: false)]
    private string $info;

    #[Column(type: 'string', unique: true, nullable: false)]
    private string $numero;

    #[Column(name: 'registered_at', type: 'datetimetz_immutable', nullable: false)]
    private DateTimeImmutable $registeredAt;

    public function __construct(string $info)
    {
        $this->info = $info;
        $this->registeredAt = new DateTimeImmutable('now');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getRegisteredAt(): DateTimeImmutable
    {
        return $this->registeredAt;
    }
}