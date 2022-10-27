<?

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
final class Card {

    #[Id, Column(type: 'string')]
    private int $id;

    #[Column(type: 'string', nullable: false)]
    private $color;

    #[ManyToOne(targetEntity: Game::class, inversedBy: 'returnedCard')]
    #[JoinColumn(name: 'game_id', referencedColumnName: 'id')]
    private Game $game;

    public function __construct(int $id, int $color) //1 = bleu, 2 = rouge, 3 = vert, 4 = jaune
    {
        $this->id = $id;
        $this->color = $color;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getColor(): int
    {
        return $this->color;
    }
}