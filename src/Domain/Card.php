<?

namespace App\Domain;

final class Card {
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