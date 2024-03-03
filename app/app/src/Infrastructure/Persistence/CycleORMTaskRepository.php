<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\Repository\TaskRepositoryInterface;
use Cycle\ORM\Select\Repository;
use Override;

/**
 * @template TTask of Task
 * @extends Repository<TTask>
 */
final class CycleORMTaskRepository extends Repository implements TaskRepositoryInterface
{
    #[Override]
    public function getAllByUser(int $userId): array
    {
        return $this->findAll(['userId' => $userId]);
    }

    #[Override]
    public function getUserTask(int $userId, int $taskId): ?Task
    {
        return $this->findOne(['id' => $taskId, 'userId' => $userId]);
    }
}
