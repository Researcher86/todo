<?php

declare(strict_types=1);

namespace App\Endpoint\Web;

use Spiral\Router\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class HomeController
{
    #[Route(route: '/', name: 'index', methods: 'GET')]
    public function index(): RedirectResponse
    {
        return new RedirectResponse('/tasks');
    }

    #[Route(route: '/bench', name: 'index', methods: 'GET')]
    public function test(): JsonResponse
    {
        return new JsonResponse('Ok');
    }
}
