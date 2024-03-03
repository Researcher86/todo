<?php

declare(strict_types=1);

namespace App\Domain\Task\Entity;

use App\Infrastructure\Persistence\CycleORMTaskRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use DateTimeImmutable;

#[Entity(
    repository: CycleORMTaskRepository::class,
)]
class Task
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    #[Column(type: 'primary')]
    private int $id;

    #[Column(type: 'integer')]
    private int $userId;

    #[Column(type: 'string')]
    private string $description;

    #[Column(type: 'datetime')]
    private DateTimeImmutable $createdAt;

    #[Column(type: 'datetime', nullable: true)]
    private ?DateTimeImmutable $finishedAt;

    public function __construct(
        int $userId,
        string $description,
    ) {
        $this->userId = $userId;
        $this->description = $description;
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getFinishedAt(): ?DateTimeImmutable
    {
        return $this->finishedAt;
    }

    public function finish(): void
    {
        $this->finishedAt = new DateTimeImmutable();
    }
}
