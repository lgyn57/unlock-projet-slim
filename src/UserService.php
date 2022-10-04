<?php

namespace App;

use Doctrine\ORM\EntityManager;
use App\Domain\User;

final class UserService
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function signUp(string $email): User
    {
        $newUser = new User($email);

        $this->em->persist($newUser);
        $this->em->flush();

        return $newUser;
    }
}