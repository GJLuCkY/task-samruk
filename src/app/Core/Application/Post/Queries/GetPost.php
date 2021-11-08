<?php

declare(strict_types=1);

namespace App\Core\Application\Post\Queries;

use App\Core\Application\Interfaces\Queries\QueryInterface;

/**
 * @psalm-immutable
 * @see GetPostsHandler
 */
final class GetPost implements QueryInterface
{
    public int $postId;

    public function __construct(int $postId)
    {
        $this->postId = $postId;
    }
}
