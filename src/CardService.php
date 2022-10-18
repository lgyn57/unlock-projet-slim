<?

namespace App;

use Doctrine\ORM\EntityManager;
use App\Domain\Card;
use Psr\Log\LoggerInterface;

final class CardService
{
    private EntityManager $em;

    public function __construct(EntityManager $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
    }

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
    }

    
}