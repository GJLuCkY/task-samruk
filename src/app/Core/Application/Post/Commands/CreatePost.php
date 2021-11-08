<?php

declare(strict_types=1);

namespace App\Core\Application\Post\Commands;

use App\Core\Application\Interfaces\Queries\QueryInterface;

/**
 * @psalm-immutable
 * @see CreatePostHandler
 */
final class CreatePost implements QueryInterface
{
    public array $requestData;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }
}
