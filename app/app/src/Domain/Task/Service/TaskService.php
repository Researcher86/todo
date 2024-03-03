<?php

declare(strict_types=1);

namespace App\Domain\Task\Service;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\Exception\TaskNotFoundException;
use App\Domain\Task\Repository\TaskRepositoryInterface;
use Cycle\ORM\EntityManagerInterface;

final readonly class TaskService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private TaskRepositoryInterface $taskRepository,
    ) {
    }

    public function create(int $userId, string $description): Task
    {
        $task = new Task($userId, $description);

        $this->entityManager->persist($task)->run();
//        $this->entityManager->clean();

        return $task;
    }

    public function finish(int $userId, int $taskId): void
    {
        $task = $this->taskRepository->getUserTask($userId, $taskId);
        if ($task === null) {
            throw new TaskNotFoundException(sprintf('Task by id %d for user %d not found.', $taskId, $userId));
        }

        $task->finish();
        $this->entityManager->persist($task)->run();

//        $this->entityManager->clean();
    }

    /**
     * @return array<Task>
     */
    public function getAllByUser(int $userId): array
    {
        return $this->taskRepository->getAllByUser($userId);
    }
}
