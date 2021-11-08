<?php

declare(strict_types=1);

namespace App\Core\Application\Post\Commands;

use App\Core\Application\Interfaces\Queries\QueryInterface;

/**
 * @psalm-immutable
 * @see UpdatePostHandler
 */
final class UpdatePost implements QueryInterface
{
    public int $postId;
    public array $requestData;

    public function __construct(int $postId, array $requestData)
    {
        $this->postId = $postId;
        $this->requestData = $requestData;
    }
}
