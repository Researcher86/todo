<?php

declare(strict_types=1);

namespace App\Domain\User\Service;

use Cycle\ORM\EntityManagerInterface;
use App\Domain\User\Entity\User;

final readonly class CreateUserService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function create(string $username, string $email): User
    {
        $user = new User($username, $email);
        $this->entityManager->persist($user)->run();

        return $user;
    }
}
