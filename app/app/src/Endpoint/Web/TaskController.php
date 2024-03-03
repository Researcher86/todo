<?php

declare(strict_types=1);

namespace App\Endpoint\Web;

use App\Domain\Task\Service\TaskService;
use App\Endpoint\Web\Filter\TaskFilter;
use Spiral\Router\Annotation\Route;
use Spiral\Views\ViewsInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class TaskController
{
    public function __construct(
        private ViewsInterface $views,
        private TaskService $service,
    ) {
    }

    #[Route(route: '/tasks', name: 'tasks', methods: 'GET')]
    public function all(): string
    {
        return $this->views->render('tasks', [
            'userId' => 1,
            'tasks' => $this->service->getAllByUser(1),
        ]);
    }

    #[Route(route: '/tasks', name: 'tasks_create', methods: 'POST')]
    public function create(TaskFilter $filter): RedirectResponse
    {
        $this->service->create($filter->userId, $filter->task);

        return new RedirectResponse('/');
    }
}
