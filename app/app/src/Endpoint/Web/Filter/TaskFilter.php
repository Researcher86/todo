<?php

declare(strict_types=1);

namespace App\Endpoint\Web\Filter;

use Spiral\Filters\Attribute\Input\Post;
use Spiral\Validation\Symfony\AttributesFilter;
use Symfony\Component\Validator\Constraints;

final class TaskFilter extends AttributesFilter
{
    #[Post]
    #[Constraints\NotBlank]
    public int $userId;

    #[Post]
    #[Constraints\NotBlank]
    public string $task;
}
