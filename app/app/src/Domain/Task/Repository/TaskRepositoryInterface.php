<?php

declare(strict_types=1);

namespace App\Domain\Task\Repository;

use App\Domain\Task\Entity\Task;

interface TaskRepositoryInterface
{
    /**
     * @return array<Task>
     */
    public function getAllByUser(int $userId): array;

    public function getUserTask(int $userId, int $taskId): ?Task;
}
