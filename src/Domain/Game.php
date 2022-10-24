<?

namespace App\Domain;

final class Game {
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